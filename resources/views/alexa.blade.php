@extends('layouts.layout')

@section('title')
    Alexa {{!empty($data) ? $data['domain'] : '' }}
@endsection

@section('content')
    <div class="content">
        <div class="header_alexa">
            @include('common.header')
        </div>
        <div class="alexa_main_content">
            @if(empty($data))
                <div class="error_domain">We don't have enough data to rank this website.</div>
            @endif
            <div class="alexa_main_content_top">
                <div class="country_left">
                    <h2>{{!empty($data) ? $data['domain'] : '' }} Traffic Statistics</h2>
                    <h4>Visitors by Country</h4>
                    <div id="regions_div"></div>
                </div>
                <div class="country_right">
                    <h4>Global Rank</h4>
                    <span>{{!empty($data) ? preg_replace('/<!--(.*)-->/Uis', '', $data['global_rank']) : '-' }}</span>
                    <h4>Rank in {{!empty($data) ? preg_replace('/<img(.*)>/Uis', '', $data['country_1']) : '-'}}</h4>
                    <span>{{!empty($data) ? preg_replace('/<!--(.*)-->/Uis', '', $data['us_rank']) : '-'}}</span>
                </div>
            </div>
            <div class="alexa_main_content_bottom">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Visitors %</th>
                            <th>Rank in Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{!empty($data) ? $data['country_1'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_1_visitors'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_1_rank'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>{{!empty($data) ? $data['country_2'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_2_visitors'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_2_rank'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>{{!empty($data) ? $data['country_3'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_3_visitors'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_3_rank'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>{{!empty($data) ? $data['country_4'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_4_visitors'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_4_rank'] : '-'}}</td>
                        </tr>
                        <tr>
                            <td>{{!empty($data) ? $data['country_5'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_5_visitors'] : '-'}}</td>
                            <td>{{!empty($data) ? $data['country_5_rank'] : '-'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('common.footer')
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('upcoming', {'packages':['geochart']});
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {

            var data = google.visualization.arrayToDataTable([
                ['Country', 'Popularity'],
                ['{{!empty($data) ? preg_replace('/&#?[a-z0-9]+;/i', '', $data['country_1']) : ''}}', {{!empty($data) ? preg_replace('/.0%/', '', $data['country_1_visitors']) * 100 : '0'}}],
                ['{{!empty($data) ? preg_replace('/&#?[a-z0-9]+;/i', '', $data['country_2']) : ''}}', {{!empty($data) ? preg_replace('/.0%/', '', $data['country_2_visitors']) * 100 : '0'}}],
                ['{{!empty($data) ? preg_replace('/&#?[a-z0-9]+;/i', '', $data['country_3']) : ''}}', {{!empty($data) ? preg_replace('/.0%/', '', $data['country_3_visitors']) * 100 : '0'}}],
                ['{{!empty($data) ? preg_replace('/&#?[a-z0-9]+;/i', '', $data['country_4']) : ''}}', {{!empty($data) ? preg_replace('/.0%/', '', $data['country_4_visitors']) * 100 : '0'}}],
                ['{{!empty($data) ? preg_replace('/&#?[a-z0-9]+;/i', '', $data['country_5']) : ''}}', {{!empty($data) ? preg_replace('/.0%/', '', $data['country_5_visitors']) * 100 : '0'}}]
            ]);

            var options = {};

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }
    </script>
@endsection