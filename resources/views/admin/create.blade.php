@extends('layout')

@section('title', 'Add Track')

@section('main')
  @if (Auth::check())
      <form method="post">
       {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <div class="form-group">
          <label for="grad_year">Graduation Year</label>
          <input type="number" id="grad_year" name="grad_year" class="form-control" value="{{old('grad_year')}}">
          <small class="text-danger">{{$errors->first('grad_year')}}</small>
        </div>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label for="roll">College <span class="required">*</span></label>
                <select name="college" class="form-control" id="collegeSelect">
                  <option value="">-- Select College --</option>
                @foreach ($colleges as $college)
                  <option value="{{ $college->college_id }}">{{ ($college->name) }}</option>
                @endforeach
                </select>
              </div>
            <small class="text-danger">{{$errors->first('college')}}</small>
          </div>
          <div class="col-md-6">
            <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
              <label for="major">Major </label>
                <select  name="major" class="form-control" id="majorSelect">
                  <option value="">-- Select Major --</option>
                </select>
            </div>
            <small class="text-danger">{{$errors->first('major')}}</small>
          </div>
        </div>
        <div class="form-group">
          <label for="intro">About Me</label>
          <textarea class="form-control" id="intro" name="intro" value="{{old('intro')}}" rows="3"></textarea>
          <small class="text-danger">{{$errors->first('intro')}}</small>
        </div>
        <button type="sumbit" class="btn btn-primary">
          Save
        </button>
      </form>
  @else
    <p> Need to login first.</p>
  @endif
<script>
  $(document).ready(function() {
  $('#collegeSelect').on('change', function(e) {
      e.preventDefault();
      var collegeId = $(this).val();
      console.log(collegeId);
      if(collegeId) {
          $.ajax({
              url: '/profile/new/'+collegeId,
              type: "GET",
              data:'_token = <?php echo csrf_token() ?>',
              success:function(data) {
                console.log("success");
                console.log(data);
                if(data){
                  $('#majorSelect').empty();
                  $('#majorSelect').focus;
                  $('#majorSelect').append('<option value="">-- Select Major --</option>');
                  $.each(data[0], function(key, value){
                  $('select[name="major"]').append('<option value="'+ key +'">' + value + '</option>');
               })
            }else{
              console.log("failed");
              $('#major').empty();
            }
            }
          });
      }else{
        console.log("empty");
        $('#major').empty();
      }
  });
});
</script>
@endsection
