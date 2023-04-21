<section class="to-do-list">
        <h1 class="to-do-list_text" id="text">To-Do List</h1>
    <form action="" id="form">
        <input type="text" name="task" class="to-do-list_input" placeholder="Введите вашу задачу" id="input-id">
        <button type="submit" class="to-do-list_btn" id="add">Add</button>
    </form>
    <div class='tasks'>
        <ul id="task-list">
                <?=$this->loadTaskList()?>
        </div>
        </ul>
    </div>
</section>