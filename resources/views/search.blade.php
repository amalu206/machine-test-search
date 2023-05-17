<!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}">
<title>Search</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<style>
.content h3
{
	padding:12px 12px 12px 40px;
	color:#777;
}

.content h4
{
	padding:12px 12px 12px 40px;
	color:#777;
}


</style>


<body style="color: #333;background-color: #f5f5f5;border-color: #ddd;">
<div class="container">
<div style="background-color: #f5f5f5;">
<h3>Search</h3>
<input type="text" class="form-controller"  style="width: 50%;height: 40px; padding-left:30px; background-color:#f5f5f5;" id="search" name="search" placeholder="Search name/designation/department"></input>


<div class="content" id="content" style="background-color: #fff; width:30%;">
</div>


<div id="main-content" style="display:flex; margin-top:20px;">
@foreach($detailsuser as $userdetailsdata)
<div class="content"  style="background-color: #fff; width:30%;">
  <h3>{{ $userdetailsdata->name }}<h3>
  <h4>{{ $userdetailsdata->designation_name }}</h4>
  <h4>{{ $userdetailsdata->department_name }}</h4>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endforeach
</div>

</div>
</div>
<script type="text/javascript">	
$('#search').on('keyup',function(){
$('#main-content').hide();
$('#content').show();
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){	
$('.content').html(data);
}
});
})


$('#search').on('keydown',function(){
	//$('#main-content').show();
    $('#content').hide();
});
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


</body>
</html>