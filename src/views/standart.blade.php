<strong>{{ $appName }}</strong> ({{ $level_name }})
<span>
    Env: {{ $appEnv }}
</span>
<pre>
    [{{ $datetime->format('Y-m-d H:i:s') }}] {{ $appEnv }}.{{ $level_name }} {{ $formatted }}
</pre>
