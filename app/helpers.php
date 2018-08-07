<?php
function flash($message,$level = 'info') {
    session()->flash('message_level',$level);
    session()->flash('message',$message);
}
