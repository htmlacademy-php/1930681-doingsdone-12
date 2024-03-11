            <section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>
                
                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                        <?php foreach ($projects as $project_name) : ?>
                            <li class="main-navigation__list-item">
                                <a class="main-navigation__list-item-link" href="#"><?= $project_name; ?></a>
                                <span class="main-navigation__list-item-count"><?= count_tasks_in_project ($tasks, $project_name); ?></span>
                            </li>
                        <?php endforeach; ?> 
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач <?= $show_complete_tasks; ?></h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

		    <label class="checkbox">
                        <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
			<input class="checkbox__input visually-hidden show_completed" <?php if ($show_complete_tasks) : ?>checked<?php endif; ?> type="checkbox">
			<span class="checkbox__text">Показывать выполненные</span>
                    </label>
		</div>

                <table class="tasks">
                    <?php foreach ($tasks as $task) : ?>
                        <?php $data = strtotime($task['data']);
                        $resultdata = ($data - time()) / 3600;
                        ?>
                        <?php if (!$show_complete_tasks && $task["complete"]) continue; ?>
                        <tr class = "tasks_item task <?php if ($resultdata <=24): ?> task--important <?php endif; ?>">
                            <td class = "task_select">
                                <label class = "checkbox task_checkbox">
                                    <input class="checkbox__input visually-hidden" type="checkbox" <?php if ($task["complete"]) echo ' checked'; ?>>
                                    <span class="checkbox__text"><?= $task["name"]; ?></span>
                                </label>
                            </td>
                            <td class="task__date"><?= $task['data']; ?></td>
                            <td class="task__controls"></td>                 

                            <td class="task__file">
                                <a class="download-link" href="#">Home.psd</a>               
                            </td>
                            <td class="task__date"><?=htmlspecialchars($task['data']);?>
                            </td>
                            <td class="task__completed">
                                <?=htmlspecialchars($task['complete']);?>                            
			            </tr>   
                    <?php endforeach; ?>
                </table>
            </main>
