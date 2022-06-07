const email = document.getElementById('email');
const workerName = document.getElementById('name'); 
const lastName = document.getElementById('lastName');
const middleName = document.getElementById('middleName');
const age = document.getElementById('age');
const experience = document.getElementById('experience');
const photo = document.getElementById('photo');
const avgSalary = document.getElementById('avgSalary');
const sendButton = document.getElementById('send');
const getButton = document.getElementById('getAllWorkers');
const list = document.getElementById('list');
const workerInfo = document.getElementById('workerInfo');

sendButton.addEventListener('click', () => {
    const formData = new FormData();
    formData.append('photo', photo.files[0]);
    const fullName = workerName.value + ' ' + lastName.value + ' ' + middleName.value;
    fetch(`http://testwork/api/?method=addWorker&email=${email.value}&fullName=${fullName}&age=${age.value}&experience=${experience.value}&avgSalary=${avgSalary.value}`,
        {
            method: "POST",
            body: formData,
        }
    );    
});

getButton.addEventListener('click', async () => {
    const response = await fetch(`http://testwork/api/?method=getWorkers`);
    const answer = await response.json();
    const workers = answer.data;
    list.innerHTML = 'Список всех сотрудников: ';
    console.log(workers);
    workers.forEach(worker => {
        const elem = document.createElement('div');
        elem.classList.add('workers');
        elem.innerHTML = worker.fullName;
        elem.addEventListener('click', () => getWorkerInfo(worker.id));
        list.appendChild(elem);
    });
});

function createWorkerInfo(text, className){
    let elem = document.createElement('div');
    elem.classList.add(className);
    elem.innerHTML = text;
    workerInfo.appendChild(elem);
}

async function getWorkerInfo(id){
    const response = await fetch(`http://testwork/api/?method=getWorker&id=${id}`);
    const answer = await response.json();
    const worker = answer.data;
    workerInfo.innerHTML = 'Информация о сотруднике: ';
    createWorkerInfo('email: ' + worker.email, 'email');
    createWorkerInfo('ФИО: ' + worker.fullName, 'fullName');
    createWorkerInfo('Возраст: ' +worker.age, 'age');
    createWorkerInfo('Опыт работы: ' +worker.experience, 'experience');
    createWorkerInfo('Средняя ЗП: ' +worker.avgSalary, 'avgSalary');
    
    let elem = document.createElement('img');
    elem.classList.add('image');
    elem.setAttribute('src', worker.photo);
    workerInfo.appendChild(elem);
}


