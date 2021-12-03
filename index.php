<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <title>Todo app</title>
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>
    <div class="Todo__container">
      <div class="todo-form">
        <input
          type="text"
          id="taskValue"
          name="name"
          placeholder="enter an todos....."
        />
        <input
          type="hidden"
          id="taskValue2"
          name="name"
          placeholder="enter an todos....."
        />
        <button class="btn-submit" type="submit">Add Todos</button>
        <button class="btn-submit2" type="submit">update</button>
      </div>
      <div id="tasks" class="todo-list"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
      $(document).ready(function () {
        // Show Tasks
        function loadTasks() {
          $.ajax({
            url: "show-todos.php",
            type: "POST",
            success: function (data) {
              $("#tasks").html(data);
            },
          });
        }

        loadTasks();

        // Add Task
        $(".btn-submit").on("click", function (e) {
          e.preventDefault();

          var task = $("#taskValue").val();

          $.ajax({
            url: "add-task.php",
            type: "POST",
            data: { task: task },
            success: function (data) {
              loadTasks();
              $("#taskValue").val("");
              if (data == 0) {
                alert("Something wrong went. Please try again.");
                $("#taskValue").focus();
              }
            },
          });
        });

        // Remove Task
        $(document).on("click", "#removeBtn", function (e) {
          e.preventDefault();
          var id = $(this).data("id");

          $.ajax({
            url: "remove-task.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
              loadTasks();
              if (data == 0) {
                alert("Something wrong went. Please try again.");
              }
            },
          });
        });
        //get task
        $(document).on("click", "#updateBtn", function (e) {
          e.preventDefault();
          var id = $(this).data("id");
          $('.btn-submit').hide();
          $('.btn-submit2').css("display","block");
          $('#taskValue2').val(id);
          $.ajax({
            url: "get-task.php",
            type: "POST",
            data: { id: id },
            success: function (data) {
              $("#taskValue").val(data).focus();

              if (data == 0) {
                alert("Something wrong went. Please try again.");
              }
            },
          });
        });
        //update task
        $(".btn-submit2").on("click", function (e) {
          e.preventDefault();
          var task = $("#taskValue").val();
          var id = $("#taskValue2").val();
          $.ajax({
            url: "update.php",
            type: "POST",
            data: { task: task,id :id},
            success: function (data) {
              if(data == 1){
                $('.btn-submit2').hide();
                $('.btn-submit').css("display","block");
                loadTasks();
                $("#taskValue").val("");
              }
              if (data == 0) {
                 $('.btn-submit2').css("display","block");
                  $('.btn-submit').hide();
                  alert("Something wrong went. Please try again.");
              }
            },
          });
        });
      });
    </script>
  </body>
</html>
