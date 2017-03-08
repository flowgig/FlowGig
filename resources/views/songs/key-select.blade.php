<select name="key">
    <option></option>
    @foreach([
    'C', 'D', 'E', 'F', 'G', 'A', 'H',
    'Cm', 'Dm', 'Em', 'Fm', 'Gm', 'Am', 'Hm',
    'C♯', 'D♯', 'E♯', 'F♯', 'G♯', 'A♯', 'H♯',
    'C♯m', 'D♯m', 'E♯m', 'F♯m', 'G♯m', 'A♯m', 'H♯m',
    'C♭', 'D♭', 'E♭', 'F♭', 'G♭', 'A♭', 'H♭',
    'C♭m', 'D♭m', 'E♭m', 'F♭m', 'G♭m', 'A♭m', 'H♭m'
    ] as $keyOption)
        <option @if(isset($key) && $keyOption == $key) selected @endif>{{ $keyOption }}</option>
    @endforeach
</select>
