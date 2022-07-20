<?php
include ('helpers.php');
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$projects = [
	'inbox' => 'Входящие', 
	'study' => 'Учеба', 
	'work' => 'Работа', 
	'home' => 'Домашние дела', 
	'auto' => 'Авто'];
$tasks = [
        [
        'name' => 'Собеседование в IT компании',
        'data' => '01.12.2019',
        'project' => $projects["work"],
        'complete' => false
        ],
        [
        'name' => 'Выполнить тестовое задание',
        'data' => '25.12.2019',
        'project' => $projects["work"],
        'complete' => false
        ], 
        [
        'name' => 'Сделать задание первого раздела',
        'data' => '21.12.2019',
        'project' => $projects["study"],
        'complete' => true
        ],
        [
        'name' => 'Встреча с другом',
        'data' => '22.12.2019',
        'project' => $projects["inbox"],
        'complete' => false
        ],
        [
        'name' => 'Купить корм для кота',
        'data' => null,
        'project' => $projects["home"],
        'complete' => false
        ],
        [
        'name' => 'Заказать пиццу',
        'data' => null,
        'project' => $projects["home"],
        'complete' => false
        ],
];
/**
 * Функция считает количество задач в текущей проекте
 * @param array $tasks массив задач
 * @param string $project проект
 * @return integer количество задач
 */
function count_tasks_in_project ($tasks, $project)
{
   $count = 0;
   foreach ($tasks as $task)
   {
       if ($task['project'] === $project)
       {
          $count++;
       };
   };
   return $count; 
};
$main_content = include_template ('main.php',['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
echo include_template ('layout.php', ['title' => 'Дела в порядке', 'content' => $main_content]);
?>
