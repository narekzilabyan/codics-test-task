<?php

namespace App\Http\Controllers;

use App\Models\User;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class UserController extends Controller
{
    public function all(Request $request)
    {
        $q = $request->get('q');
        $age = $request->get('age');
        $country = $request->get('country');

        if ($q || $age || $country){
            $client = ClientBuilder::create()->setHosts(['http://elasticsearch:9200'])->build();

            $parameters = [];
            $parameters['index'] = 'users';
            $parameters['size'] = 10000;
            $parameters['body']['query']['bool'] = [];

            if ($age){
                $parameters['body']['query']['bool']['filter'][] = ['term' => ['age' => $age]];
            }

            if ($country){
                $parameters['body']['query']['bool']['filter'][] = ['term' => ['country.keyword' => $country]];
            }

            if ($q){
                $parameters['body']['query']['bool']['must'] = [
                    'multi_match' => [
                    'query' => $q,
                    "type"  => "phrase_prefix",
                    'fields' => [
                        'name',
                        'lastName'
                    ]
                ]];
            }

            $res = $client->search($parameters);

            $users = array_column($res['hits']['hits'], '_source');
        } else {
            $users = User::all();
        }

        //get countries list for filter
        $countries = CountryListFacade::getList();

        return view('user.list', [
            'users' => $users,
            'countries' => $countries
        ]);
    }
}
