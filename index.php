<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO App</title>
</head>
<body>
    <form action="addTodo.php" method="post" class='submitTodo'> 
        <label for="todo">What needs done?</label>
        <input type="text" name='todo'>
        <input type="text" id='date' name='date' display='none'>
        <input type="submit" >
    </form>

    <?php
        require_once "config.php";

        $get_sql = "SELECT * FROM todo";
        $todos = $conn->query($get_sql);

        if($todos->num_rows > 0){
            while($row = mysqli_fetch_assoc($todos)){
                echo "<div class='todo' key=".$row['todo_id']."><h4>".$row["todo_description"]."</h4>"."<a href=delete.php?id=".$row['todo_id'].">   Delete Item</a>"."</div><br>";
            }
        }else{
            echo "No records";
        }

        $conn->close();
    ?>

    

<script> 
    let form = document.querySelector('.submitTodo');
    let date = document.querySelector('#date');
    date.style.display = 'none';
    form.addEventListener('submit', ()=>{
        date.setAttribute('value', new Date())
    })

    let todoElements = document.querySelectorAll('.todo')
    console.log(todoElements)

    todoElements.forEach(todo=>{
        console.log(todo.children)
        todo.firstChild.addEventListener('click', (e)=>{
        
        if(todo.getAttribute('editing')){
            console.log(e.target.childNodes)
            todo.removeChild(todo.childNodes[2])
            todo.removeAttribute('editing')
        }else{
            let formElement = document.createElement('div')
            formElement.innerHTML = `<form action="update.php" method="post"><input type="text" name="updated"> <input style='display:none;' type="text" value=${e.target.parentElement.getAttribute('key')} name="id"><input type="submit" value="update"></form>`
            todo.setAttribute('editing', 'true')
            
            todo.append(formElement)
            
        }
        
    })
    })
</script>
</body>
</html>