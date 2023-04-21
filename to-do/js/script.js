// ajax запрос
console.log(document.getElementsByTagName("ul"))
function ajax(link){
    if (window.XMLHttpRequest) {
        // код для IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // код для IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("task-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", link, true);
    xmlhttp.send();
}
function loadTaskList() {
    ajax("/");
}
window.onmouseover = function () {
    //Выбираем все задачи
    let elements = document.querySelectorAll(".to-do-list_task");
    for (let i = 0; i < elements.length; i++) {
        elements[i].ondblclick = function() {
            let val=this.innerHTML;
            let input=document.createElement("input");
            input.value=val;
            input.onblur=function(){
                let val=this.value;
                this.parentNode.innerHTML=val;
                // window.onclick = function () {
                //     updateTask(val, elements[i].id);
                // }
                updateTask(val, elements[i].id);
            }
            this.innerHTML="";
            this.appendChild(input);
            input.focus();
        }
    };

    let markers = document.querySelectorAll(".to-do-list_marker");
    for (let i = 0; i < markers.length; i++) {
        let done;
        markers[i].onclick = function () {
            if(elements[i].classList.contains('to-do-list_done')) {
                done = 0;
            }
            else {
                done = 1;
            }
            markTask(elements[i].id, done);
        }
    }
    //Выбираем все ссылки
    let links = document.querySelectorAll(".to-do-list_delete");
    for (let i = 0; i < links.length; i++) {
        links[i].onclick = function(event) {
            event.preventDefault();
            deleteTask(this.href);

        };
    };

    //Поведение формы
    document.getElementById('form').onsubmit = function (event) {
        event.preventDefault();
        let input = document.getElementById('input-id');

        let value = input.value;
        addTask(value);
        input.value = '';
    }

    //Обновить задачи
    function updateTask(val, id) {
        if (val == "") {
            val = "Задача";
        };
        ajax("update?task="+val+"&id="+id);
    }

    //Добавить задачи
    function addTask(task) {
        if (task == "") {
            task = "Задача";
        }
        ;
        ajax("add?task=" + task);
    }

    //Удалить задачи
    function deleteTask(link) {
        ajax(link);
    };

    //Пометить задачи
    function markTask(id, done) {
        ajax('done?id='+id +"&done="+done);

    };
}