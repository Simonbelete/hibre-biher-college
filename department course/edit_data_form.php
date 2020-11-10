
<div class="form-group">
 <label>Enter Course Code</label>
 <input type="text" required="required" name="code" id="code" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Course Name</label>
 <input type="text" required="required"  name="name" id="name" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Course Credit</label>
 <input type="text" required="required"  name="credit" id="credit" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Course ECTS</label>
 <input type="text" required="required"  name="ects" id="ects" class="form-control" />
</div>

<script>
 $(document).ready(function () {
  var code = localStorage.getItem('code');
  var name = localStorage.getItem('name');
  var credit = localStorage.getItem('credit');
  var ects = localStorage.getItem('ects');

  $('#code').val(code);
  $('#name').val(name);
  $('#credit').val(credit);
  $('#ects').val(ects);  
 });
</script>
