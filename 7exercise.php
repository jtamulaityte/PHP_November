<!--
// PAPILDOMAS
//  7. Parašykite programą, kuri sugeneruotų ornamentą: https://iili.io/H3J974e.png . 
// Ornamentas turi būti sugeneruotas naudojant HTML ir PHP. (2 balai)
-->

<html>
<head>

</head>
<body>
    <table>
        <tbody>
            <?php for ($j = 0; $j < 7; $j++) { ?>
                <tr>
                    <?php for ($i = 0; $i < 7; $i++) { 
                        $displayColor = "white";

                        if ($i === $j || ($i === (6-$j))) {
                            $displayColor = "black";
                        }
                        ?>
                        <td style="width: 100px; height: 100px; background-color: <?= $displayColor; ?>; border: solid 1px #000000"></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php

