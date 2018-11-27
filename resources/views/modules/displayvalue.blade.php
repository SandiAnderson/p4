@if($type=='number')
    value='{{(isset($source)? session($source):'0')?? old($source,'0') }}'
@elseif($type=='text')
    value='{{ old($source, 'MM/DD/YYYY') }}'
@elseif($type=='select')
    {{ old($source) == $value ? 'selected' : '' }}
@elseif($type=='radio')
    {{ old($source) == $value ? 'checked' : '' }}
@endif