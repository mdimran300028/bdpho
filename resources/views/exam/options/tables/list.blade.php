@foreach($options as $option)
    <li class="{{ $answerId == $option->id? 'text-primary font-weight-bold':'text-dark' }}">
        <a href="#" class="{{ $answerId == $option->id? 'text-primary font-weight-bold':'text-dark' }}"
           onclick="event.preventDefault(), optionEdit({
               option:JSON.stringify({{ $option }}),
               optionId:Number({{ $option->id }}),
               answerId:Number({{ $answerId }}),
               })">{!! $option->content !!}
        </a>
    </li>
@endforeach


