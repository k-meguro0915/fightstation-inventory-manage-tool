
<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(function(){
  $.ajaxSetup(
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  });
  $.ajax({
    type: "post", //HTTP通信の種類
    url:'/ajax/getInventory', //通信したいURL
    dataType: 'json',
    data:{
      id:0
    }
  })
  //通信が成功したとき
  .done((res)=>{
    console.log(res.message)
  })
  //通信が失敗したとき
  .fail((error)=>{
    console.log(error.statusText)
  })
});
</script>