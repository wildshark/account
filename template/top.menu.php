<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:50 PM
 */

function top_menu($roleID){
    echo"
            <ul class='nav'>
                <li class='' ><a title='' href='account.php?user=user-profile&error=0&alert=1&c=".$roleID."'><i class='icon icon-user'></i> <span class='text'>Profile</span></a></li>
                <li class=' dropdown' id='menu-messages'><a href='account.php?user=user-profile&error=0&alert=1&c=".$roleID."' data-toggle='dropdown' data-target='#menu-messages' class='dropdown-toggle'><i class='icon icon-envelope'></i> <span class='text'>Messages</span> <span class='label label-important'>5</span> <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li><a class='sAdd' title='' href='#'>new message</a></li>
                        <li><a class='sInbox' title='' href='#'>inbox</a></li>
                        <li><a class='sOutbox' title='' href='#'>outbox</a></li>
                        <li><a class='sTrash' title='' href='#'>trash</a></li>
                    </ul>
                </li>
                <li class=''><a title='' href='#'><i class='icon icon-cog'></i> <span class='text'>Settings</span></a></li>
                <li class=''><a title='' href='account.php?user=logout&error=0&alert=0'><i class='icon icon-share-alt'></i> <span class='text'>Logout</span></a></li>
            </ul>
    ";
}

top_menu($roleID);