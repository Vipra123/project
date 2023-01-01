</div>
<footer>
    <div class="container-fluid bg-dark text-white mt-5">
      <div class="row">
        <div class="col-lg-4 p-4">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum vero distinctio aliquid quas ullam ea et similique nostrum perspiciatis! Minus dolores consequuntur nihil quam doloremque eligendi architecto qui eius voluptatem.</p>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque obcaecati aperiam nisi labore omnis quod.</p>
        </div>
        <div class="col-lg-4 p-4">
          <h5 class="mb-3">Links</h5>
        </div>
        <div class="col-lg-4 p-4">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consectetur consequatur dolorum repudiandae, ea debitis explicabo amet! Autem praesentium, ab dignissimos eos corrupti ducimus aperiam sint. Non sapiente qui, sint nesciunt ducimus explicabo cupiditate quae eveniet distinctio recusandae ipsum at ratione eos laborum iusto adipisci ullam in, officiis eius sed, consequatur quidem repudiandae molestiae facere. Quo, accusantium et? Laudantium, repudiandae?</p>
        </div>
      </div>
    </div>
        
      </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script> --}}
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('userform.getdata') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'profile', name: 'profile'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'gender', name: 'gender'},
            {data: 'dob', name: 'dob'},
            {data: 'address', name: 'address'},
            {data: 'video', name: 'video'},
            {data: 'status', name: 'status'},
         
            { 
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>

</html>
  