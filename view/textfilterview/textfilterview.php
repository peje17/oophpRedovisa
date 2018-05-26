<?php

namespace Anax\View;

/**
 * View file for the Game type GET
 */

?>

<div class="container">

    <h1><?= $title ?></h1>

    <h2>bbcode</h2>
        <table class="table">
             <tr>
                 <td>Source</td>
                 <td><?= $data["bbcodesource"] ?></td>
             </tr>
             <tr>
                 <td>Html</td>
                 <td><?= htmlentities($data["bbcodehtml"]) ?></td>
             </tr>
             <tr>
                 <td>Present</td>
                 <td><?= $data["bbcodehtml"] ?></td>
             </tr>
        </table>

    <h2>link</h2>
    <table class="table">
         <tr>
             <td>Source</td>
             <td><?= $data["linksource"] ?></td>
         </tr>
         <tr>
             <td>Html</td>
             <td><?= htmlentities($data["linkhtml"]) ?></td>
         </tr>
         <tr>
             <td>Present</td>
             <td><?= $data["linkhtml"] ?></td>
         </tr>
    </table>

    <h2>markdown</h2>
    <table class="table">
         <tr>
             <td>Source</td>
             <td><?= $data["markdownsource"] ?></td>
         </tr>
         <tr>
             <td>Html</td>
             <td><?= htmlentities($data["markdownhtml"]) ?></td>
         </tr>
         <tr>
             <td>Present</td>
             <td><?= $data["markdownhtml"] ?></td>
         </tr>
    </table>

    <h2>nl2br</h2>
    <table class="table">
         <tr>
             <td>Source</td>
             <td><?= $data["nl2brsource"] ?></td>
         </tr>
         <tr>
             <td>Html</td>
             <td><?= htmlentities($data["nl2brhtml"]) ?></td>
         </tr>
         <tr>
             <td>Present</td>
             <td><?= $data["nl2brhtml"] ?></td>
         </tr>
    </table>
</div>
