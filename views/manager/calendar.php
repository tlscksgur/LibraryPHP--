<?php 
    $libraryIdx = ss()->idx;
    $rents = DB::fetchAll("
        SELECT r.idx, r.rentDate, r.dueDate, u.name as userName, b.bookName
        from rent r
        join user u 
        on u.idx = r.userIdx
        join book b
        on b.idx = r.bookIdx
        where r.libraryIdx = {$libraryIdx}
    ");

    $year = $_GET['year'] ?? date('Y');
    $month = $_GET['month'] ?? date('m');
    $day = 1;

    $firstDay = strtotime("$year-$month-01");
    $startWeek = date('w', $firstDay);
    $lastDay = date('t', $firstDay);

    $prevYear = $month == 1 ? $year - 1 : $year;    
    $prevMonth = $month == 1 ? 12 : $month - 1;
    $nextYear = $month == 12 ? $yaer + 1 : $year;
    $nextMonth = $month == 12 ? 1 : $month + 1;
?>

<main id="calendar">
    <div class="calendarIn">
        <div class="calendarHeader tac">
            <a href="/calendar?year=<?= $prevYear ?>&month=<?= $prevMonth ?>">◀ 이전</a>
            <span class="currentMonth"><?= $year ?>년 <?= $month ?>월</span>
            <a href="/calendar?year=<?= $nextYear ?>&month=<?= $nextMonth ?>">다음 ▶</a>
        </div>
        <table id="table">
            <tr>
                <th>일</th>
                <th>월</th>
                <th>화</th>
                <th>수</th>
                <th>목</th>
                <th>금</th>
                <th>토</th>
            </tr>
            <?php
            for ($row = 0; $row < 5; $row++) {
                echo "<tr>";

                for ($col = 0; $col < 7; $col++) {

                    if ($row === 0 && $col < $startWeek) {
                        echo "<td></td>";
                    } elseif ($day > $lastDay) {
                        echo "<td></td>";
                    } else {
                        echo "<td>";
                        echo "<strong>$day</strong>";

                        foreach ($rents as $r) {
                            $start = strtotime($r->rentDate);
                            $end = strtotime($r->dueDate);
                            $current = strtotime("$year-$month-$day");

                            if ($current >= $start && $current <= $end) {
                                echo "<div class='rent'>";
                                echo htmlspecialchars($r->bookName);
                                echo "<br>(" . htmlspecialchars($r->userName) . ")";
                                echo "</div>";
                            }
                        }

                        echo "</td>";
                        $day++;
                    }
                }

                echo "</tr>";
            }
            ?>
        </table>
    </div>
</main>