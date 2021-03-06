@extends('layouts.app')

@section('title')
    Youtube Sight - Subscribers counter from YouTube Analytics API - Taste The Code Toolbox
@endsection

@section('content')
    <div class="flex flex-wrap pt-0">
        <div class="flex w-full p-3">
            <div class="text-left w-1/2">
                Connected channel: <strong>{{ $channel['name'] }}</strong>
            </div>
            <div class="text-right w-1/2">
                <a href="{{ route('youtube-sight.logout') }}" class="underline hover:no-underline mr-3">Logout</a>
            </div>

        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3 ">
            <!--Metric Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-green-600"><i class="fa fa-user-plus fa-2x fa-fw fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-400">Subscribers Gained</h5>
                        <h3 class="font-bold text-3xl text-gray-600">{{ number_format($data[1]) }} <span class="text-green-500"><i
                                        class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-red-600"><i class="fa fa-user-minus fa-2x fa-fw fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-400">Subscribers Lost</h5>
                        <h3 class="font-bold text-3xl text-gray-600">{{ number_format($data[2]) }} <span class="text-red-500"><i
                                        class="fas fa-caret-down"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-green-600"><i class="fa fa-users fa-2x fa-fw fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-400">Current Subscribers</h5>
                        <h3 class="font-bold text-3xl text-gray-600"><span class="text-green-500"><i class="fas fa-plus text-md"></i> {{ number_format($data[1] - $data[2]) }}</span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-orange-600"><i class="fa fa-eye fa-2x fa-fw fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-400">Total Views</h5>
                        <h3 class="font-bold text-3xl text-gray-600">{{ number_format($data[0]) }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-indigo-600"><i class="fas fa-clock fa-2x fa-fw fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-400">Minutes watched</h5>
                        <h3 class="font-bold text-3xl text-gray-600">{{ number_format($data[3]) }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-red-600"><i class="fas fa-stopwatch fa-2x fa-fw fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-400">Avg. View Duration</h5>
                        <h3 class="font-bold text-3xl text-gray-600">{{ (int)($data[4]/60) }}:{{ ($data[4]%60) < 10 ? '0'.($data[4]%60) : $data[4]%60 }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>

        <div class="px-3 w-full mt-4">
            <div class="w-full mx-auto border rounded-lg bg-gray-600 p-4 text-white">
                API Access URL: <span class="font-bold">{{ route('api.youtube-sight.index', ['guid' => $channel['api_access_key']])  }}</span><br>
                GUID: <span class="font-bold">{{ $channel['api_access_key'] }}</span>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-4 mt-4">
            <p class="mb-4">You can use the URL above with your subscriber counter to get the data from this page to your device. Full examples for usage with Arduino can be found in the <a href="https://github.com/bkolicoski/youtube-sight-example" class="underline hover:no-underline" target="_blank">example repository on GitHub</a>.</p>

            <p class="mb-4">This URL is only visible to you but if you choose to share it with anyone, others will be able to see the same data as you so treat it as you wish.</p>

            <p class="mb-4">On the right side, there are examples of the two success responses that you can get, one as plain text and the other as JSON. To get the JSON response, you need to specify the “Accept” header in your request to “application/json”.</p>

            <p class="mb-4">The text response order of the parameters is as follows:<br>
                views, subscribers_gained, subscribers_lost, subscribers_count, estimated_minutes_watched, average_view_duration
            </p>

            <p class="mb-4">
                There are three parameters that you can send to the API endpoint.
                <dl>
                    <dt class="font-bold">include-data-stats</dt>
                    <dd class="pl-4">Boolean - if included, it adds the YouTube Data API statistics in the same request (rounded subscribers count, views and videos uploaded)</dd>
                    <dt class="font-bold">start_date</dt>
                    <dd class="pl-4">datetime - sets the start date from when to show data. If omitted or wrong format, the channel published date is used. It supports all of the <a href="https://www.php.net/manual/en/datetime.formats.php">standard PHP datetime formats</a></dd>
                    <dt class="font-bold">end_date</dt>
                    <dd class="pl-4">datetime - sets the end date till when to show data. If omitted or wrong format, the current date is used. It supports all of the <a href="https://www.php.net/manual/en/datetime.formats.php">standard PHP datetime formats</a></dd>
                </dl>
            </p>
        </div>
        <div class="w-full md:w-1/2 p-4 mt-4">
            <p>Text Response</p>
            <pre class="mb-4">57559,609,67,542,106322,1:50</pre>
            <p>JSON Response</p>
            <pre class="mb-4">{
    "views": 95857,
    "subscribers_gained": 860,
    "subscribers_lost": 99,
    "subscribers_count": 761,
    "estimated_minutes_watched": 174101,
    "average_view_duration": "1:48",
    "data_statistics": {
        "subscriber_count": "763",
        "video_count": "79",
        "views": "96125"
    }
}</pre>
        </div>

        <div class="w-full text-center p-3 bg-red-200 m-3">
            <p>Disconnecting a channel will terminate access to the YouTube Sight API, remove the permissions granted to use the YouTube Analytics API and delete all records.</p>
            <a href="{{ route('youtube-sight.disconnect') }}" onclick="return confirm('Do you really want to disconnect this channel?')" class="underline hover:no-underline">Remove channel</a>
        </div>

        <div class="w-full text-sm p-4 mb-4">
            ** Because of the way the YouTube Analytics API works and
            <a class="text-blue-400 hover:text-blue-600" href="https://stackoverflow.com/questions/13018142/latency-with-youtube-analytics-api" target="_blank">aggregates data</a>, the stats displayed are usually delayed by at least one day and do not represent the real time situation from YouTube Creator Studio.
        </div>
    </div>
@endsection
