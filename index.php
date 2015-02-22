<html>
<head>
<title>Babby Tracker</title>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>

$(function(){
	if (!supports_html5_storage()){
		alert("This app requires a modern browser, sorry!");
	}
});

function supports_html5_storage(){
	try{
		return 'localStorage' in window && window['localStorage'] !== null;
	}catch (e){
		return false;
	}
	return false;
}

function generateUUID(){
	var d = performance && performance.now ? performance.now() : new Date().getTime();
	var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
		var r = (d + Math.random()*16)%16 | 0;
		d = Math.floor(d/16);
		return (c=='x' ? r : (r&0x3|0x8)).toString(16);
	});
	return uuid;
}

var data = new function(){

	var self = this;

	self.events = {};
	self.deleteQueue = {};

	if (window.localStorage['events']){
		try{
			self.events = JSON.parse(window.localStorage['events']);
		}catch(e){
		}
	}
	if (window.localStorage['deleteQueue']){
		try{
			self.deleteQueue = JSON.parse(window.localStorage['deleteQueue']);
		}catch(e){
		}
	}

	self.addEvent = function(info){
		info.uid = generateUUID();
		info.synced = false;
		self.events[info.uid] = info;
		window.localStorage['events'] = JSON.stringify(self.events);
		return info.uid;
	};

	self.saveEvent = function(info){
		if (!info.uid) console.log("ERROR! Trying to save an event that  has no uid");
		info.synced = false;
		self.events[info.uid] = info;
		window.localStorage['events'] = JSON.stringify(self.events);
	};

	self.delEvent = function(info){
		if (!info.uid) console.log("ERROR! Trying to delete an event that  has no uid");
		delete self.events[info.uid];
		self.deleteQueue[info.uid] = 1;
		window.localStorage['events'] = JSON.stringify(self.events);
		window.localStorage['deleteQueue'] = JSON.stringify(self.deleteQueue);
	};

	return self;
}();

</script>
</head>
<body>

BABBY TRACKER

</body>
</html>

