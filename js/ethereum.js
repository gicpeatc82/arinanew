
var history_amout = 5 //顯示歷史紀錄數目


var web = "http://127.0.0.1:8545"

//https://ropsten.infura.io/v3/4a4b1a18a1c74e8ca0ec6fd4126aa6d9

//http://localhost:8545



if (typeof web3 !== 'undefined') {
 web3 = new Web3(web3.currentProvider);
 console.log('metamask found');
} else {
  alert("請安裝web3錢包如metamask")
 console.log('Using' + web);
 web3 = new Web3(new Web3.providers.HttpProvider(web));
}

/**** test***********/
var address = '0xbc82a950d16a2077a363f6fcc5f1764bd6ddeff0'

var infoContract = new web3.eth.Contract(abi, address);

var ArinaContract = new web3.eth.Contract(abi_erc20,'0x0bd0c2036fd2b00af041b3e20850c40923c56895');


/**** *producion
var address = '0xcCdA5213d453388fB5fB43054BC261c8636b1e51'

var infoContract = new web3.eth.Contract(abi, address);

var ArinaContract = new web3.eth.Contract(abi_erc20,'0xE6987CD613Dfda0995A95b3E6acBAbECecd41376');
***********/


var userAccount;


//const function(判斷輸贏及剪刀石頭布的函數,因區塊練回傳值為0,1,2)

function win(_result){
// 0 => 輸   1 => 平手   2 => 贏
var gameDraw = jQuery.i18n.prop('gameDraw');
var gameLose = jQuery.i18n.prop('gameLose');
var gameWin = jQuery.i18n.prop('gameWin');

if (_result == 0){
        return gameLose;
    } else if (_result == 1){
        return gameDraw;
    } else if (_result == 2){
        return gameWin;
    } else {
        return "error";
    }
}



function mora(_orig){
  // 0 => 布   1 => 剪刀   2 => 石頭
  var gamePaper = jQuery.i18n.prop('gamePaper');
  var gameScissors = jQuery.i18n.prop('gameScissors');
  var gameStone = jQuery.i18n.prop('gameStone');
      if (_orig == 0){
          return gamePaper;
      } else if (_orig == 1){
          return gameScissors;
      } else if (_orig == 2){
          return gameStone;
      } else {
          return "error";
      }
}



function Arina_judgment(Arina_totBalance, total_airdrop_Arina , airdrop_Arina){
  if (Arina_totBalance >= total_airdrop_Arina/2){
      return airdrop_Arina;
  } else if(total_airdrop_Arina/2 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/4){
      return airdrop_Arina/2;
  } else if(total_airdrop_Arina/4 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/8){
      return airdrop_Arina/4;
  }else if(total_airdrop_Arina/8 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/16){
      return airdrop_Arina/8;
  } else if(total_airdrop_Arina/16 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/32){
      return airdrop_Arina/16;
  } else if(total_airdrop_Arina/32 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/64){
      return airdrop_Arina/32;
  } else if(total_airdrop_Arina/64 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/128){
      return airdrop_Arina/64;
  } else if(total_airdrop_Arina/128 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/256){
      return airdrop_Arina/128;
  } else if(total_airdrop_Arina/256 > Arina_totBalance
  && Arina_totBalance >= total_airdrop_Arina/512){
      return airdrop_Arina/256;
  } else if(total_airdrop_Arina/512 > Arina_totBalance
  && Arina_totBalance){
      return airdrop_Arina/512;
  }
  else return 0;
}



function Arina_amount_judgment(_level, _Arina) {
        if (_level == 1){
            return _Arina*5/10;
        }else if (_level == 2){
            return _Arina*6/10;
        } else if (_level == 3){
            return _Arina*7/10;
        } else if (_level == 4){
            return _Arina*8/10;
        } else if (_level == 5){
            return _Arina*9/10;
        } else return "error";
    }



    function eth_amount_judgment(_level){
            if (_level == 1){
                return 1 ;
            } else if (_level == 2){
                return 3 ;
            } else if (_level == 3){
                return 5 ;
            } else if (_level == 4){
                return 10 ;
            } else if (_level == 5){
                return 20 ;
            } else return "error";
        }



window.addEventListener('load', async () => {
                    if (window.ethereum) {
                        try {
                            await ethereum.enable()
                            console.log(window.ethereum)
                        } catch (error) {
                            console.error(error)
                        }
                    }
                })



web3.eth.getAccounts(function(error, result) {
  userAccount = result[0];

  //監聽事件
  infoContract.events.Play_game({filter:{from:userAccount}})
  .on("data",function(event){

    //console.log(event);

    let record = event.returnValues.record;
    let play = event.returnValues.player;
    let comp = event.returnValues.comp;
    //console.log(event);
    console.log(win(record));

    alert(win(record));

    var videoPaperDraw = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ehnejXfQezw?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/J4580IxL3iI?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/Eb8RRCLLK3s?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var vedeoPaperLose = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/i7fHRwz1k_0?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/CI2hG9gSnuc?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/h3If7Xipimc?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var vedeoPaperWin = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/P1xblfOR19g?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/TKFtmnapPXA?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/kw8QgoqZXoU?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var videoScissorDraw = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ZFJAhc_n8P0?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ctpe5IMSQIU?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/EwZNppihkCE?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var videoScissorLose = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/WTOt3BjrDq8?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/wcyuf5o2Anw?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/6gNDMTSCqz4?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var videoScissorWin = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/QiltyrXuObA?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/HvbVTwX5Cqs?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/yZLEs19S-7Y?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]

    var videoStoneDraw = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/KpaUIs5cQEo?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/x4XM81N5JyQ?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/-TwIZF1GVJk?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var videoStoneLose = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/cbGmxuy5gEA?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/-hkg288Bf3M?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/Bzwly4OyENc?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    var videoStoneWin = [
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/h6EHlmQKQig?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/qmDt0fmkN9Q?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
      '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ZZbkGnndkTM?rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ]
    // 0 => 布   1 => 剪刀   2 => 石頭
    // 0 => 輸   1 => 平手   2 => 贏
    let index = get_random()
    //     $("#game-video").empty().append(videoPaperDraw[index]);
    if (comp == 0 && record == 0){
      $("#game-video").empty().append(vedeoPaperLose[index]);
    } else if (comp == 0 && record == 1){
      $("#game-video").empty().append(videoPaperDraw[index]);
    } else if (comp == 0 && record == 2){
      $("#game-video").empty().append(vedeoPaperWin[index]);
      log_events();
    } else if (comp == 1 && record == 0){
      $("#game-video").empty().append(videoScissorLose[index]);
    } else if (comp == 1 && record == 1){
      $("#game-video").empty().append(videoScissorDraw[index]);
    } else if (comp == 1 && record == 2){
      $("#game-video").empty().append(videoScissorWin[index]);
      log_events();
    } else if (comp == 2 && record == 0){
      $("#game-video").empty().append(videoStoneLose[index]);
    } else if (comp == 2 && record == 1){
      $("#game-video").empty().append(videoStoneDraw[index]);
    } else if (comp == 2 && record == 2){
      $("#game-video").empty().append(videoStoneWin[index]);
      log_events();
    }
    $("#paly-video").click();
  })
  .on('error', console.error);
});

//點擊按鈕後調用函數
function play_a_mora(mora){
  if (mora == "paper"){
    infoContract.methods.play_paper().send({from:userAccount,gas:250000})
    .then((result)=>{
      console.log(result);
    });
  } else if(mora == "scissors"){
    infoContract.methods.play_scissors().send({from:userAccount,gas:250000})
    .then((result)=>{
      console.log(result);
    });
  } else if(mora == "stone"){
    infoContract.methods.play_stone().send({from:userAccount,gas:250000})
    .then((result)=>{
      console.log(result);
    });
  } 
}

function log_events(){
  web3.eth.getAccounts(function(error, result) {
    userAccount = result[0];
    Promise.all([
      ArinaContract.methods.balanceOf(address).call(),
      infoContract.methods.total_airdrop_Arina().call(),
      infoContract.methods.airdrop_Arina().call(),
      infoContract.methods.level_judgment(userAccount).call(),
      infoContract.methods.airdrop_GIC().call(),
    ]).then(([Arina_totBalance, total_airdrop_Arina, airdrop_Arina, _level, airdrop_GIC])=>{

      var  Arina_totBalance = Arina_totBalance/(10**8)
      var  total_airdrop_Arina =  total_airdrop_Arina/(10**8)
      var  airdrop_Arina =  airdrop_Arina/(10**8)
      winGIC =  airdrop_GIC/(10**18)

      //console.log(Arina_totBalance, total_airdrop_Arina, airdrop_Arina, _level, airdrop_GIC);
      var now_airdrop = Arina_judgment(Arina_totBalance, total_airdrop_Arina, airdrop_Arina);
      //console.log(now_airdrop);
      winArina = Arina_amount_judgment(_level, now_airdrop);
      winETH = eth_amount_judgment(_level);
      console.log("GIC= " + winGIC);
      console.log("Arina= " + winArina);
      $("#win-arina").html(Math.floor(winArina));
      $("#win-gic").html(winGIC);
    });
  });
}
////radom 1~3
function get_random(){
  return Math.floor(Math.random()*3)
}


//show函數包裝給setInterval做每秒刷新
function show(){
//讀取地址(web3.js beta版在讀取地址後地址可能會丟失,所以每次動作都先讀取地址)
  web3.eth.getAccounts(function(error, result) {
      userAccount = result[0];

      if(userAccount != old_address){
        alert("New Address");
      }

      if (userAccount == undefined){
        $("#address").html("Adddress not found");
      } else{
        $("#address").html(userAccount);
      }

      
//顯示猜拳紀錄
infoContract.getPastEvents("Play_game",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})
.then(function(events) {
  //console.log(events);
  let length = events.length;

    if (userAccount == undefined){
      $("#record0").html("Adddress not found");
      $("#record").html("Adddress not found");
    } else if (length == 0){
      $("#record0").html("No record");
      $("#record").html("No record");
    } else{
      var event_last = events[length-1]
      var record = event_last.returnValues.record;
      var play = event_last.returnValues.player;
      var comp = event_last.returnValues.comp;

      var playerChooses = jQuery.i18n.prop('playerChooses');
      var computerChooses = jQuery.i18n.prop('computerChooses');
      var gameResult = jQuery.i18n.prop('gameResult');
      $("#record0").html(playerChooses +mora(play)+ computerChooses +mora(comp)+ gameResult +win(record)+"<br>");

      if (length < 2){
      $("#record").html("No record");
      } else{
        var event_last = events[length-2]
        var record = event_last.returnValues.record;
        var play = event_last.returnValues.player;
        var  comp = event_last.returnValues.comp;
        $("#record").html(playerChooses +mora(play)+ computerChooses +mora(comp)+ gameResult +win(record)+"<br>");

        for(var i=3; i<history_amout+2; i++){
          if(length-i<0){
            break
          }
          var event_last = events[length-i]
          var record = event_last.returnValues.record;
          var play = event_last.returnValues.player;
          var comp = event_last.returnValues.comp;
          $("#record").append(playerChooses +mora(play)+ computerChooses +mora(comp)+ gameResult +win(record)+"<br>");
        }
      }
    }
  });


//顯示開獎紀錄
infoContract.getPastEvents("Random",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})
.then(function(events) {

    let length = events.length;

    if (userAccount == undefined){
      $("#lottery0").html("Adddress not found");
      $("#lottery").html("Adddress not found");
    } else if (length == 0){
      $("#lottery0").html("No record");
      $("#lottery").html("No record");
    } else{
      var event_last = events[length-1]
      var random_player = event_last.returnValues.random_player;
      var random_lottery = event_last.returnValues.random_lottery;

      var PlayerNumber = jQuery.i18n.prop('PlayerNumber');
      var ComputerNumber = jQuery.i18n.prop('ComputerNumber');
      $("#lottery0").html(PlayerNumber + random_player + "<br>"+ ComputerNumber + random_lottery+"<br>");
      if (length < 2){
      $("#lottery").html("No record");
      } else{
        var event_last = events[length-2]
        var random_player = event_last.returnValues.random_player;
        var random_lottery = event_last.returnValues.random_lottery;
        $("#lottery").html(PlayerNumber + random_player +"<br>"+ ComputerNumber + random_lottery+"<br>");

        for(var i=3; i<history_amout+2; i++){
          if(length-i<0){
            break
          }

          var event_last = events[length-i]
          var random_player = event_last.returnValues.random_player;
          var random_lottery = event_last.returnValues.random_lottery;
          
          $("#lottery").append(PlayerNumber + random_player + "<br>"+ ComputerNumber + random_lottery+"<br>");
        }
      }
    }
  });

    infoContract.methods.view_readyTime(userAccount).call({from:userAccount})
    .then(function(result){
      if (userAccount == undefined){
        $("#readyTime").html("Adddress not found");
      } else{
        $("#readyTime").html(result+'秒');
      }
    });
});

var old_address = userAccount; //判斷更改地址用
}


function show_token(){
  web3.eth.getAccounts(function(error, result) {
    if (userAccount == undefined){
      $("#amount_token").html("請登入Ethereum錢包");
    } else{

      Promise.all(

        [
          ArinaContract.methods.balanceOf(address).call(),
          infoContract.methods.total_airdrop_Arina().call(),
          infoContract.methods.airdrop_Arina().call(),
          infoContract.methods.level_judgment(userAccount).call(),
          infoContract.methods.airdrop_GIC().call(),
        ])
        .then(([Arina_totBalance, total_airdrop_Arina, airdrop_Arina, _level, airdrop_GIC])=>{
        //console.log(Arina_totBalance, total_airdrop_Arina, airdrop_Arina, _level, airdrop_GIC);

        var  Arina_totBalance = Arina_totBalance/(10**8)
        var  total_airdrop_Arina =  total_airdrop_Arina/(10**8)
        var  airdrop_Arina =  airdrop_Arina/(10**8)
        var  GIC =  airdrop_GIC/(10**18)


        //console.log(Arina_totBalance, total_airdrop_Arina, airdrop_Arina, _level, airdrop_GIC);
        var now_airdrop = Arina_judgment(Arina_totBalance, total_airdrop_Arina, airdrop_Arina);
        //console.log(now_airdrop);
        var Arina = Arina_amount_judgment(_level, now_airdrop);

        var ETH = eth_amount_judgment(_level);
          $("#expect-arina").html(Math.floor(Arina));
          $("#expect-gic").html(GIC);

          $("#amount_token").html("猜拳獲勝 可獲得: '"+GIC+"顆GIC' 和 '"+Arina+"顆Arina'");
          $("#amount_ETH").html("中獎時 可獲得: '"+ETH+"顆ETH'");

      });
    }
  })
};



show();

show_token();

setInterval(function(){show()},1000); //指定1秒重新整理一次

setInterval(function(){show_token()},1000); //指定20秒重新整理一次

