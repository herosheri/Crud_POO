<?php include 'includes/includes_CSS.php'; ?>
<html>
  <head>
    <title>PHP POO AJAX CRUD</title>
  </head>

  <body>
    <h1>Bonjours</h1>

    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <form action="" method="post" id="form">
            <div id="result"></div>
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" id="title" name="title" class="form-control">
            </div>
             <div class="form-group">
              <label for="">Description</label>
              <textarea type="text" id="description" name="description" class="form-control" rows="3" cols=""></textarea>
            </div>
            <div class="form-group">
              <button type="submit" id="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 mt-1">
          <div id="show"></div>
          <div id="fetch"></div>
        </div>
      </div>

    </div>


   
    <div class="modal fade" id="modal_record" role="dialog">
      <div class="modal-dialog" style="width:42%; margin-top:10px">
        <div class="modal-content" style="margin-left:6.2%">
            <div class="box-body pad">
               <div class="register-box-body">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"> </h3>
                </div>

                <div class="col-md-12">

                   <div class="modal-body form">
                        <div id="read_data"></div>
                   </div>

                 </div>
                 <div class="modal-footer">             
                 </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modal_edit" role="dialog">
      <div class="modal-dialog" style="width:42%; margin-top:10px">
        <div class="modal-content" style="margin-left:6.2%">
            <div class="box-body pad">
               <div class="register-box-body">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"> </h3>
                </div>


                        <div id="edit_data"></div>

                <div class="form-group">
                  <button type="submit" id="update" class="btn btn-primary">Update</button>
                </div>
                 <div class="modal-footer">             
                 </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).on("click", "#submit", function(e){
        e.preventDefault();
        //alert("click");

        var title = $("#title").val();
        var description = $("#description").val();
        var submit = $("#submit").val();
        //alert(title);

        $.ajax({
          url: "insert.php",
          type: "post",
          data: {
            title: title,
            description: description,
            submit: submit
          },
          success: function(data){
            fetch();
            $("#result").html(data);
          }

        });

        $("#form")[0].reset();
      });

      //Fetch Records
      function fetch(){
        //alert("test");
        $.ajax({
          url: "fetch.php",
          type: "post",
          success: function(data){
            $("#fetch").html(data);
          }

        });
      }
      fetch();


      // Delete record

      $(document).on("click", "#del", function(e){
        e.preventDefault();
        //alert("delete");

        if (window.confirm("do you want delete record")){
          var del_id = $(this).attr("value");
          //alert(del_id);

          $.ajax({
            url: "del.php",
            type: "post",
            data: {
              del_id:del_id
            },
            success: function(data){
              fetch();
              $("#show").html(data);
            }
          });

      } else {
        return false;
      }
   
      });

      // Read record

      $(document).on("click", "#read", function(e){
        e.preventDefault();
        //alert("read");

        var read_id = $(this).attr("value");
        //alert(read_id);

        $.ajax({
          url: "read.php",
          type: "post",
          data: {
            read_id: read_id
          },
          success: function(data){
            $("#read_data").html(data);
          }
        });
      });

      // Edit record

      $(document).on("click", "#edit", function(e){
        e.preventDefault();

        var edit_id = $(this).attr("value");
        //alert(edit_id);

        $.ajax({
          url: "edit.php",
          type: "post",
          data: {
            edit_id: edit_id
          },
          success: function(data){
            $("#edit_data").html(data);
          }
        });
      });


      // Update record

           $(document).on("click", "#update", function(e){
               e.preventDefault();

               var edit_title = $("#edit_title").val();

               var edit_description = $("#edit_description").val();

               var update = $("#update").val();

               var edit_id = $("#edit_id").val();

               //alert(edit_id);

               $.ajax({
                url: "update.php",
                type: "post",
                data: {
                  edit_id: edit_id,
                  edit_title: edit_title,
                  edit_description: edit_description,
                  update: update
                },
                success: function(data){
                  fetch();
                  $("#show").html(data);
                }
               })


           });

    </script>









  <?php include 'includes/includes_JS.php'; ?>
  </body>
</html>