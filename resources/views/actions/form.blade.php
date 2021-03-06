
@section('head')
  {!! Html::style('/packages/datetimepicker/jquery.datetimepicker.css') !!}
  <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
@stop


@section('footer')
  {!! Html::script('/packages/datetimepicker/jquery.datetimepicker.full.min.js') !!}

  <script>
  $.datetimepicker.setLocale('{{App::getLocale()}}');


  jQuery(function(){
    jQuery('#start').datetimepicker({
      format:'Y-m-d H:i',

      onShow:function(ct)
      {
        this.setOptions({
          maxDate:jQuery('#stop').val()?jQuery('#stop').val():false, formatDate:'Y-m-d H:i'
        })
      },
      step: 30,
      dayOfWeekStart: 1,



    });

    jQuery('#stop').datetimepicker({
      format:'Y-m-d H:i',
      onShow:function( ct ){
        this.setOptions({
          minDate:jQuery('#start').val()?jQuery('#start').val():false, formatDate:'Y-m-d H:i'
        })

        /*
        this.setOptions({
        defaultTime: jQuery('#start').val()?jQuery('#start').val():false, formatTime:'Y/m/d H:i'
      });



      this.setOptions({
      defaultDate: jQuery('#start').val()?jQuery('#start').val():false, formatDate:'Y/m/d H:i'
    });
    */

  },
  step: 30,
  dayOfWeekStart: 1,

});
});

/*
jQuery(function(){
jQuery('#start').datetimepicker({
format:'Y-m-d H:i',
step: 30,
dayOfWeekStart: 1,
});

jQuery('#stop').datetimepicker({
format:'Y-m-d H:i',
step: 30,
dayOfWeekStart: 1,
onShow:function( ct ){
this.setOptions({
defaultDate:jQuery('#start').val()
})
}

});
});
*/
</script>

<script>
CKEDITOR.replace( 'wysiwyg' );
</script>


@stop



<div class="form-group">
  {!! Form::label('name', trans('messages.title')) !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
  {!! Form::label('body', trans('messages.description')) !!}
  {!! Form::textarea('body', null, ['id' => 'wysiwyg', 'class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
  {!! Form::label('location', trans('messages.location')) !!}
  {!! Form::textarea('location', null, ['class' => 'form-control']) !!}
</div>

<div class="row">

  <div class="col-md-6">
    <div class="form-group">
      {!! Form::label('start', trans('messages.starts')) !!}<br/>
      @if (isset($action->start))
        {!! Form::text('start', $action->start->format('Y-m-d H:i') , ['class' => 'form-control', 'id' => 'start', 'required']) !!}
      @else
        {!! Form::text('start', \Carbon\Carbon::now()->format('Y-m-d H:i') , ['class' => 'form-control', 'id' => 'start', 'required']) !!}
      @endif

    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      {!! Form::label('stop', trans('messages.ends')) !!}<br/>
      @if (isset($action->stop))
        {!! Form::text('stop', $action->stop->format('Y-m-d H:i') , ['class' => 'form-control', 'id' => 'stop', 'required']) !!}
      @else
        {!! Form::text('stop', null , ['class' => 'form-control', 'id' => 'stop', 'required']) !!}
      @endif
    </div>
  </div>
</div>
