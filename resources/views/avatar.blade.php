<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="{{$size}}px"
     height="{{$size}}px" viewBox="0 0 ${this._size} ${this._size}">
    <
    {{ $round ? 'circle' : 'rect' }}
    fill="{{ $bgColor }}"
    width="{{ $size }}"
    height="{{ $size }}"
    cx="{{ $size/2 }}"
    cy="{{ $size/2 }}"
    r="{{ $size/2 }}"/>
    <text x="50%" y="50%" style="color: {{ $textColor }};line-height: 1;font-family: {{ $fontFamily }};"
          alignment-baseline="middle" text-anchor="middle" font-size="{{ round($site * $fontSize) }}"
          font-weight="{{ $fontWeight }}" dy=".1em" dominant-baseline="middle" fill="{{ $textColor }}">{{ $text }}
    </text>
</svg>
