/* LocalStorage */

const getOrderCode = () => parseInt(localStorage.getItem("db_code")) ?? 0;
const setOrderCode = (dbCode) => localStorage.setItem("db_code", dbCode);

/***************************/

const isValid = () => {
    return document.getElementById('form').reportValidity();
};

const clearFields = () => {
    const fields = document.querySelectorAll('.clear');
    fields.forEach(field => field.value =  "")
};

const clearTable = () => {
    const rows = document.querySelectorAll('#table>tbody tr');
    rows.forEach(row => row.parentNode.removeChild(row));
};

const codeGenerator = () => {
    return Math.floor(Date.now() * Math.random() / 1000 );
};

/***************************/

/* Main */

const readCategory = async () => {
    let tr = '';
    const tbody = document.querySelector("tbody");

    const data = await fetch("http://localhost/php/categories/select.php?", { 
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    });
    const response = await data.json();
    
    for(let index in response) {
        tr += `
        <tr>
        <form>
            <td>${response[index].code}</td>
            <td>${response[index].name.replace(/</g, "$lt;").replace(/>/g,"&gt;")}</td>
            <td>${response[index].tax.replace(/</g, "$lt;").replace(/>/g,"&gt;")}</td>
            <td class="btn-delete"><button name="delete" class="material-symbols-outlined icon" data-action="delete" id="delete-${response[index].code}">
            delete</button></td>
            </form>
        </tr>
        `
        }
    tbody.innerHTML = tr;
};

const createCategory = async () => {
    let code = codeGenerator();
    let name = document.getElementById("name").value.replace(/</g, "$lt;").replace(/>/g,"&gt;");
    let tax = document.getElementById("tax").value.replace(/</g, "$lt;").replace(/>/g,"&gt;"); 
    
    if(name == '' || tax == '') {
        alert('Please fill all the blanks input areas.');
    } else {
        await fetch("http://localhost/php/categories/insert.php?", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({"code": code, "name": name, "tax": tax}),
        }).then(function(response) {
            response.json();
            if(response) {
                updateTable();
                return response;
            }
        }) 
    }
};

const deleteRow = async (e) => {
    const [action, index] = e.target.id.split('-');
    if(action == 'delete') {
        const response = confirm("Delete data? You can't undo this action");
        if(response) {
            deleteCategory(index);
        }
    }
};

const deleteCategory = async (code) => {
    const obj = {
        code: code,
    };
    const searchParams = new URLSearchParams(obj);
    const queryString = searchParams.toString();

    await fetch("http://localhost/php/categories/delete.php?" + queryString, {
            method: "DELETE",
        }).then(function(response) {
            response.json();
            if(response) {
                updateTable();
                return response;
            }
    })
};

const updateTable = () => { 
    readCategory();
    clearFields();
    
    if(!getOrderCode()) {
        setOrderCode(0);
    }
};
updateTable();

/* Events */

document.getElementById('add').addEventListener('click', createCategory);
document.querySelector('#table>tbody').addEventListener('click', deleteRow);

/***************************/





