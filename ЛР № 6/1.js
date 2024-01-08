let form = document.getElementById("reg_form");

form.addEventListener("submit", function(event){
    event.preventDefault(); // отменяет стандартные действия браузера

    // <span class="error-text">Заполните поле</span>

  /*  let data = new FormData(this);
    data.forEach(function(item, index){
        console.log(index,item)
    });  */
  

    let errors = document.querySelectorAll(".error-text");

    if(errors.length){
        Array.from(errors).forEach((errorSpan) => {
            errorSpan.parentElement.classList.remove("error");
            errorSpan.remove();
        })
    }

    let hasError = false;

    let nameInput = document.querySelector("#name");
    let cityInput = document.querySelector("#city");
    let familiaInput = document.querySelector("#familia");
    let otchInput = document.querySelector("#otch");
    let grazInput = document.querySelector("#graz");
    let nationInput = document.querySelector("#nation");
    let namesInput = document.querySelector("#names");
    let whosInput = document.querySelector("#whos");
    let serieInput = document.querySelector("#serie");
    let numberInput = document.querySelector("#number");


    let fields = [nameInput, emailInput, phoneInput, familiaInput, cityInput, otchInput, grazInput, nationInput, namesInput, whosInput, serieInput, numberInput];

    fields.forEach((field) => {
        if(field.value == ""){
            let span = document.createElement("span");
            span.className = "error-text"; // span.classList.add("error-text");
            span.innerText = "Заполните поле";
            field.insertAdjacentElement("afterend", span);
            field.parentElement.classList.add("error");
            hasError = true;
        }
    });

    let fam = ["#a", "#b", "#c"];

    let checked = fam.some((radioId) => {
        return document.querySelector(radioId).checked; //document.querySelector(radioId) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите семейное положение";
        document.querySelector("#c").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    let education = ["#vis", "#nvis", "#sr", "#n"];

    checked = education.some((checkboxId) => {
        return document.querySelector(checkboxId).checked; //document.querySelector(checkbox) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите профессиональное образование";
        document.querySelector("#n").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    let education2 = ["#srp", "#os", "#nach", "#nm"];

    checked = education2.some((checkboxId) => {
        return document.querySelector(checkboxId).checked; //document.querySelector(checkbox) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите общее образование";
        document.querySelector("#nm").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    if(!hasError){
        let div = document.querySelector(".result");

        div.innerHTML += `Фамилия: ${familiaInput.value}<br>`;
        div.innerHTML += `Имя: ${nameInput.value}<br>`;
        div.innerHTML += `Отчество: ${otchInput.value}<br>`;
        div.innerHTML += `Гражданство: ${grazInput.value}<br>`;
        div.innerHTML += `Национальность: ${nationInput.value}<br>`;
        div.innerHTML += `Наименование документа, удостоверяющего личность: ${namesInput.value}<br>`;
        div.innerHTML += `Наименование документа, удостоверяющего личность: ${serieInput.value}<br>`;
        div.innerHTML += `Серия: ${numberInput.value}<br>`;
        div.innerHTML += `Номер: ${whosInput.value}<br>`;
        div.innerHTML += `Email: ${emailInput.value}<br>`;
        div.innerHTML += `Телефон: ${phoneInput.value}<br>`;
        div.innerHTML += `Город: ${cityInput.value}<br>`;
        if(document.querySelector("#a").checked){
            div.innerHTML += `Семейное положение: ${document.querySelector("#a").value}<br>`;
        } else if(document.querySelector("#b").checked){
            div.innerHTML += `Семейное положение: ${document.querySelector("#c").value}<br>`;
        } else if(document.querySelector("#c").checked){
            div.innerHTML += `Семейное положение: ${document.querySelector("#c").value}<br>`;
        } 

        let educationValue = [];

        education.forEach((education) => {
            if(document.querySelector(education).checked){
                hobbyValue.push(document.querySelector(education).value);
            }
        })

        let education2Value = [];

        education2.forEach((education2) => {
            if(document.querySelector(education2).checked){
                hobbyValue.push(document.querySelector(education2).value);
            }
        })

        div.innerHTML += `Профессиональное образование: ${educationValue.join(",")}<br>`;
        div.innerHTML += `Общее образование: ${education2Value.join(",")}<br>`;

        this.reset(); // очищение формы this==form
    }
})
function correctdate(date) {
  if (isblank(date)) {
    return "Дата рождения некорректна";
  }
  date = date.toString();
  let massiv = date.split("-");
  if (parseInt(massiv[1]) < 10) {
    massiv[1] = '0' + parseInt(massiv[1]);
  }
  else{}
  if (parseInt(massiv[2]) < 10) {
    massiv[2] = '0' + parseInt(massiv[2]);
  }
  else{}
  return "Ваша дата рождения:" + massiv[2] + "." + massiv[1] + "." + massiv[0];
  
}