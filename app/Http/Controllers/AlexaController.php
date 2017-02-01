<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AlexaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Убираем протокол https
        $request->domain = preg_replace('#^https?://#', '', $request->domain);

        //Добавляем http:// чтобы легче было распарсить URL и получить домен
        if (strpos($request->domain, 'http://') === false) {
            $request->domain = 'http://'.$request->domain;
        }

        //Парсим URL
        $urlParts = parse_url($request->domain);

        //Записываем в $request->domain только значение домен $urlParts['host']
        if (array_key_exists('host', $urlParts)) {
            $request->domain = preg_replace('/^www\./', '', $urlParts['host']);
        }

        //Валидируем полученное значение домена
        if(!preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $request->domain)) {
            return redirect()->action('HomeController@index');
        }

        //Парсим http://www.alexa.com/siteinfo/
        require (app_path() .'/simplehtmldom/simple_html_dom.php');

        $html = file_get_html('http://www.alexa.com/siteinfo/'.$request->domain);

        $rank = array();
        foreach($html->find('span.col-pad > div > strong.metrics-data') as $span) {
            $rank[] = $span->innertext;
        }

        $country = array();
        foreach($html->find('span.span-col > table.table > tbody > tr > td > a') as $a) {
            $country[] = $a->innertext;
        }

        $visitor = array();
        foreach($html->find('span.span-col > table.table > tbody > tr > td > span') as $span) {
            $visitor[] = $span->innertext;
        }

        $data = array();

        if (empty($html->find('section#no-enough-data'))) {
            $data = [
                'domain' => $request->domain,
                'global_rank' => $rank[0],
                'us_rank' => $rank[1],
                /*Country 1*/
                'country_1' => preg_replace('/<img(.*)>/Uis', '', $country[0]),
                'country_1_visitors' => $visitor[0],
                'country_1_rank' => $visitor[1],
                /*Country 2*/
                'country_2' => preg_replace('/<img(.*)>/Uis', '', $country[1]),
                'country_2_visitors' => $visitor[2],
                'country_2_rank' => $visitor[3],
                /*Country 3*/
                'country_3' => preg_replace('/<img(.*)>/Uis', '', $country[2]),
                'country_3_visitors' => $visitor[4],
                'country_3_rank' => $visitor[5],
                /*Country 4*/
                'country_4' => preg_replace('/<img(.*)>/Uis', '', $country[3]),
                'country_4_visitors' => $visitor[6],
                'country_4_rank' => $visitor[7],
                /*Country 5*/
                'country_5' => preg_replace('/<img(.*)>/Uis', '', $country[4]),
                'country_5_visitors' => $visitor[8],
                'country_5_rank' => $visitor[9]
            ];
        }

        return view('alexa', compact('data'));
    }
}
