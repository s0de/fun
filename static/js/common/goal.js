// Копирование текста из блока +
// Нажатие на элементы +
// Наведение на элементы
// Открытие всплывашки - это нажатие на кнопку/ссылку, которая и открывает всплывашку
// Взаимодействие с формой
// Успешная отправка формы
// Просмотр блока

// Events

document.body.addEventListener('copy', function(e) {
  let closest = e.target.closest("[data-goal-copy]");
  if (closest) {
    _proceedDataGoal(closest, 'goalCopy');
  }
});

document.body.addEventListener('click', function(e) {
  let closest = e.target.closest('[data-goal-click]');
  if (closest) {
    _proceedDataGoal(closest, 'goalClick');
  }
});

window.addEventListener('scroll', function() {
  function getTopOfElement(element) {
    let now = new Date().getTime();
    let lastUpdate = element.dataset.documentOffsetTopTime ? element.dataset.documentOffsetTopTime : 0;
    if (now - lastUpdate > 800) {
      element.dataset.documentOffsetTop = window.pageYOffset + element.getBoundingClientRect().top;
      element.dataset.documentOffsetTopTime = now;
    }
    return parseInt(element.dataset.documentOffsetTop, 10);
  }

  document.querySelectorAll('[data-goal-see]').forEach(function(block) {
    let startBorder = window.pageYOffset + window.innerHeight - window.innerHeight * 0.5;
    if (startBorder >= getTopOfElement(block)) {
      _proceedDataGoal(block, 'goalSee');
    }
  });
});

document.querySelectorAll('[data-goal-hover]').forEach(function(block) {
  block.addEventListener('mouseover', function () {
    if (block.dataset.goalHover) {
      _proceedDataGoal(block, 'goalHover');
    }
  })
});

function eventInput(e) {
  let closest = e.target.closest('[data-goal-input]');
  if (closest) {
    _proceedDataGoal(closest, 'goalInput');
  }
}

document.body.addEventListener('input', eventInput);
document.body.addEventListener('change', eventInput);

function _proceedDataGoal(element, datasetAttribute) {
  let goalValue = element.dataset[datasetAttribute];
  delete element.dataset[datasetAttribute];
  goal(goalValue);
}

function yandexGoal(goal) {
  if (window.Ya && window.Ya._metrika) {
    window.Ya._metrika.counter.reachGoal(goal);
  }
}

function googleGoal(goal, category) {
  if (gtag) {
    gtag('event', goal, {
      'event_category': category
    });
  }
}

function goal(goal) {
  yandexGoal(goal);
  googleGoal(goal, 'events');
}

window.goal = goal;