<select name="key">
    <option></option>
    @foreach([
    'C', 'D', 'E', 'F', 'G', 'A', 'B',
    'Cm', 'Dm', 'Em', 'Fm', 'Gm', 'Am', 'Bm',
    'C♯', 'D♯', 'E♯', 'F♯', 'G♯', 'A♯', 'B♯',
    'C♯m', 'D♯m', 'E♯m', 'F♯m', 'G♯m', 'A♯m', 'B♯m',
    'C♭', 'D♭', 'E♭', 'F♭', 'G♭', 'A♭', 'B♭',
    'C♭m', 'D♭m', 'E♭m', 'F♭m', 'G♭m', 'A♭m', 'B♭m'
    ] as $keyOption)
        <option @if(isset($key) && $keyOption == $key) selected @endif>{{ $keyOption }}</option>
    @endforeach
</select>
