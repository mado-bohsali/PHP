<?php

/* Returns a string formatted according to the given format string
   using the given integer timestamp or the current time if no timestamp is given.
*/

//format: 'D, d M Y H:i:s'
//be sure to use single quotes to prevent characters like \n from becoming newlines

print(Date('D, d M Y H:i:s'));
echo "\n";
print(mktime(0,1,1));