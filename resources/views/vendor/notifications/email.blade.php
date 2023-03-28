<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;800;900&display=swap" rel="stylesheet">

    @component('mail::message')
        <div style="text-align: center; padding: 20px">
            <img src="https://i.postimg.cc/50cYGq9k/reset-notification.png"/>
        </div>
            <div>
                <p style="font-family:'Inter', sans-serif ; font-weight: 900; font-size: 16px; color: black; text-align: center; margin-top: 10px">{{$outroLines[0]}}</p>
            </div>
            <div>
                <p style="font-family:'Inter', sans-serif ; font-weight: 400; font-size: 12px; color: black; text-align: center">{{$outroLines[1]}}</p>
            </div>
            <div style="display: table; margin: auto;">
                @component('mail::button', ['url' => $actionUrl])
                    {{ $actionText }}
                @endcomponent
            </div>
    @endcomponent



