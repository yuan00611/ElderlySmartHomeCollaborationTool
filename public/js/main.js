//canvas物件
canvas = document.getElementById("mycanvas");
ctx = canvas.getContext("2d");

//設定canvas大小
canvas.width = 600;
canvas.height = 450;

//設定滑鼠事件
canvas.onmousedown = canvasClick;
canvas.onmouseup = stopDragging;
canvas.onmouseout = stopDragging;
canvas.onmousemove = dragImage;

//背景
var image = new Image();
//科技圖片array
var pics = [];

//成本array
var price = [];
var allMoney = 0;

//各個需求程度array
var requirementArray = [];
var requirementSumArray = [];
var see_p = [];
var listen_p = [];
var muscle_p = [];
var balance_p = [];
var memory_p = [];
var sleep_p = [];
var accident_p = [];
var health_p = [];
var psy_p = [];

//背景圖
image.onload = function(){
	ctx.drawImage(image, 0, 0, 600, 450);
};
image.src = 'uploadPic/file.png';

//圖片隨機擺放function
function randomFromTo(from, to) {
    return Math.floor(Math.random() * (to - from + 1) + from);
};

//加入科技圖片
function addPicture(tech, money, s_P, l_P, mu_P, b_P, me_P, sl_P, a_P, h_P, p_P){
	var i = new Image();
	i.onload = function(){
		var x = randomFromTo(0, canvas.width - 30);
        var y = randomFromTo(0, canvas.height - 30);
        i.px = x;
        i.py = y;
        i.isSelected = false;
		ctx.drawImage(i, x, y, 30, 30);
	};
	i.src = tech;

	pics.push(i);

	drawAllPics();
	//ctx.drawImage(tech, 50, 50, 50, 50);

	//console.log(tech);
	price.push(Number(money));
	addAllMoney();

	see_p.push(Number(s_P));
	listen_p.push(Number(l_P));
	muscle_p.push(Number(mu_P));
	balance_p.push(Number(b_P));
	memory_p.push(Number(me_P));
	sleep_p.push(Number(sl_P));
	accident_p.push(Number(a_P));
	health_p.push(Number(h_P));
	psy_p.push(Number(p_P));

	requirementArray[0] = (see_p);
	requirementArray[1] = (listen_p);
	requirementArray[2] = (muscle_p);
	requirementArray[3] = (balance_p);
	requirementArray[4] = (memory_p);
	requirementArray[5] = (sleep_p);
	requirementArray[6] = (accident_p);
	requirementArray[7] = (health_p);
	requirementArray[8] = (psy_p);
	
	requirementSumArray = [];

	for (var j = 0; j < requirementArray.length; j++) {
		var a = requirementArray[j].reduce(addRequirement);
		
		requirementSumArray.push(Number(a));
	}

};

//成本加總
function addAllMoney(){
	var all = 0;
	for (var i = 0; i < price.length; i++) {
		all = all + price[i];
	}
	allMoney = all;
}

//需求成效相加
function addRequirement(total, num){
    return total + num;
}

//重新繪製畫布
function drawAllPics(){
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.drawImage(image, 0, 0, 600, 450);

	for (var i = 0; i < pics.length; i++) {
		var p = pics[i];
		ctx.drawImage(p, p.px, p.py, 30, 30);
	}

};

//清除所有科技
function clearCanvas(){
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	pics = [];
	price = [];
	see_p = [];
	listen_p = [];
	muscle_p = [];
	balance_p = [];
	memory_p = [];
	sleep_p = [];
	accident_p = [];
	health_p = [];
	psy_p = [];
	requirementArray = [];
	requirementSumArray = [];
	drawAllPics();
	addAllMoney();
};

//清除選取的單一科技
function deleteSelectPic(){
	pics.splice( pics.indexOf(previousSelectedPic), 1);
	price.splice( pics.indexOf(previousSelectedPic), 1);
	see_p.splice( pics.indexOf(previousSelectedPic), 1);
	listen_p.splice( pics.indexOf(previousSelectedPic), 1);
	muscle_p.splice( pics.indexOf(previousSelectedPic), 1);
	balance_p.splice( pics.indexOf(previousSelectedPic), 1);
	memory_p.splice( pics.indexOf(previousSelectedPic), 1);
	sleep_p.splice( pics.indexOf(previousSelectedPic), 1);
	accident_p.splice( pics.indexOf(previousSelectedPic), 1);
	health_p.splice( pics.indexOf(previousSelectedPic), 1);
	psy_p.splice( pics.indexOf(previousSelectedPic), 1);

	requirementArray[0] = (see_p);
	requirementArray[1] = (listen_p);
	requirementArray[2] = (muscle_p);
	requirementArray[3] = (balance_p);
	requirementArray[4] = (memory_p);
	requirementArray[5] = (sleep_p);
	requirementArray[6] = (accident_p);
	requirementArray[7] = (health_p);
	requirementArray[8] = (psy_p);

	requirementSumArray = [];
	for (var k = 0; k < requirementArray.length; k++) {
		var c = requirementArray[k].reduce(addRequirement);
		requirementSumArray.push(Number(c));
	}

	drawAllPics();
	addAllMoney();
};

var previousSelectedPic;

var isDragging = false;

function canvasClick(e){
	var clickX = e.pageX - canvas.offsetLeft;
	var clickY = e.pageY - canvas.offsetTop;

	for (var i = pics.length - 1; i >= 0; i--) {
		var p = pics[i];

		var distanceFromCenter = Math.sqrt(Math.pow(p.px - clickX, 2) + Math.pow(p.py - clickY, 2));

		if (distanceFromCenter <= 40) {
			if (previousSelectedPic != null) {
				previousSelectedPic.isSelected = false;
			}
			previousSelectedPic = p;

			p.isSelected = true;

			isDragging = true;

			drawAllPics();

			return;
		}
	}
};

function stopDragging(){
	isDragging = false;
};

function dragImage(e){
	if (isDragging == true) {
		if (previousSelectedPic != null) {
			var x = e.pageX - canvas.offsetLeft;
			var y = e.pageY - canvas.offsetTop;

			previousSelectedPic.px = x;
			previousSelectedPic.py = y;

			drawAllPics();
		}
	}
};


//點選收合科技
$(".flip_see").click(function(){
	$(".see").slideToggle("slow");
});
$(".flip_listen").click(function(){
	$(".listen").slideToggle("slow");
});
$(".flip_muscle").click(function(){
	$(".muscle").slideToggle("slow");
});
$(".flip_balance").click(function(){
	$(".balance").slideToggle("slow");
});
$(".flip_memory").click(function(){
	$(".memory").slideToggle("slow");
});
$(".flip_sleep").click(function(){
	$(".sleep").slideToggle("slow");
});
$(".flip_accident").click(function(){
	$(".accident").slideToggle("slow");
});
$(".flip_health").click(function(){
	$(".health").slideToggle("slow");
});
$(".flip_psy").click(function(){
	$(".psy").slideToggle("slow");
});

//console.log({{ $posts->image_path }});


//var image = "{{ asset('img/平面空間.png') }}" ;
//ctx.drawImage("{{ asset('img/平面空間.png') }}", 10, 10, 250, 200);

/*    window.onload = function(){
        var canvas = 
        var context = 
        

    };

*/

//------------------------result頁面--------------------
function finish(){
	/*
	var moneyElement = document.getElementById("allAmount");
	moneyElement.textContent = "共花費成本:" + allMoney;

	var requireElement = document.getElementById("require_p");
	requireElement.textContent = "解決需求程度:";

	var r1 = document.getElementById("eye");
	r1.textContent = requirementSumArray[0] + "%";

	var r2 = document.getElementById("ear");
	r2.textContent = requirementSumArray[1] + "%";

	var r3 = document.getElementById("mus");
	r3.textContent = requirementSumArray[2] + "%";

	var r4 = document.getElementById("bal");
	r4.textContent = requirementSumArray[3] + "%";

	var r5 = document.getElementById("mem");
	r5.textContent = requirementSumArray[4] + "%";

	var r6 = document.getElementById("sle");
	r6.textContent = requirementSumArray[5] + "%";

	var r7 = document.getElementById("acc");
	r7.textContent = requirementSumArray[6] + "%";

	var r8 = document.getElementById("hea");
	r8.textContent = requirementSumArray[7] + "%";

	var r9 = document.getElementById("ps");
	r9.textContent = requirementSumArray[8] + "%";
	*/

	//背景
	var image2 = new Image();

	image2.src = canvas.toDataURL("image/png");
	var saveI = document.getElementById("saveImage");
	saveI.appendChild(image2);


}

