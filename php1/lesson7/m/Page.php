<?phpfunction getText_(){	return file_get_contents('.data/text.txt');}function setText_($text){	file_put_contents('.data/text.txt', $text); header('location: ?c=page&action=read');	exit();}