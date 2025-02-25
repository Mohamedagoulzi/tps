let workTime = 25 * 60;
let shortBreakTime = 5 * 60;
let longBreakTime = 15 * 60;
let currentTime = workTime;
let interval;
let sessions = 0;

const minutesElement = document.getElementById('minutes');
const secondsElement = document.getElementById('seconds');

function startTimer() {
    clearInterval(interval);
    interval = setInterval(updateTimer, 1000);
}

function pauseTimer() {
    clearInterval(interval);
}

function resetTimer() {
    clearInterval(interval);
    currentTime = workTime;
    sessions = 0;
    updateDisplay();
}

function updateTimer() {
    if (currentTime <= 0) {
        sessions++;
        if (sessions % 4 === 0) {
            alert('Time for a long break!');
            currentTime = longBreakTime;
        } else if (sessions % 2 === 0) {
            alert('Time for a short break!');
            currentTime = shortBreakTime;
        } else {
            alert('Time to work!');
            currentTime = workTime;
        }
    } else {
        currentTime--;
    }
    updateDisplay();
}

function updateDisplay() {
    const minutes = Math.floor(currentTime / 60);
    const seconds = currentTime % 60;
    minutesElement.textContent = minutes < 10 ? '0' + minutes : minutes;
    secondsElement.textContent = seconds < 10 ? '0' + seconds : seconds;
}

// Task Management
const taskList = document.getElementById('task-list');
const newTaskInput = document.getElementById('new-task');

function addTask() {
    const taskText = newTaskInput.value;
    if (taskText) {
        const listItem = document.createElement('li');
        listItem.textContent = taskText;
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = () => taskList.removeChild(listItem);
        listItem.appendChild(deleteButton);
        taskList.appendChild(listItem);
        newTaskInput.value = '';
    }
}
function increaseWorkTime() {
    workTime += 60;
    currentTime = workTime;
    document.getElementById('work-time-display').textContent = workTime / 60;
    updateDisplay();
}

function decreaseWorkTime() {
    if (workTime > 60) {
        workTime -= 60;
        currentTime = workTime;
        document.getElementById('work-time-display').textContent = workTime / 60;
        updateDisplay();
    }
}
