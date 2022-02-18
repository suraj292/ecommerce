<h2>Email verification blade</h2>

<h3>Hello {{ $name }}</h3>

<h4>The Link will expire after 15 Minutes of receiving.</h4>

<p>
    <a href="{{ route('home').'/'.'verification'.'/'.$userId.'/'.$link }}"> Click Here </a>
    to Verify your account or Copy Past below link in browser.
</p>

<hr>

<p>
    final link: <a href="{{ route('home').'/'.'verification'.'/'.$userId.'/'.$link }}">{{ route('home').'/'.'verification'.'/'.$userId.'/'.$link }}</a>
</p>
