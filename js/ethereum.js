//

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

//test
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

if (_result == 0){

        return "輸了!!!";

    }

    else if (_result == 1){

        return "平手~";

    }

    else if (_result == 2){

        return "贏啦!!!";

    }

    else {

        return "error";

    }

}



function mora(_orig){

  // 0 => 布   1 => 剪刀   2 => 石頭

      if (_orig == 0){

          return "布";

      }

      else if (_orig == 1){

          return "剪刀";

      }

      else if (_orig == 2){

          return "石頭";

      }

      else {

          return "error";

      }

}



function Arina_judgment(Arina_totBalance, total_airdrop_Arina , airdrop_Arina){

  if (Arina_totBalance >= total_airdrop_Arina/2){

      return airdrop_Arina;

  }

  else if(total_airdrop_Arina/2 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/4){

      return airdrop_Arina/2;

  }

  else if(total_airdrop_Arina/4 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/8){

      return airdrop_Arina/4;

  }

  else if(total_airdrop_Arina/8 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/16){

      return airdrop_Arina/8;

  }

  else if(total_airdrop_Arina/16 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/32){

      return airdrop_Arina/16;

  }

  else if(total_airdrop_Arina/32 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/64){

      return airdrop_Arina/32;

  }

  else if(total_airdrop_Arina/64 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/128){

      return airdrop_Arina/64;

  }

  else if(total_airdrop_Arina/128 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/256){

      return airdrop_Arina/128;

  }

  else if(total_airdrop_Arina/256 > Arina_totBalance

  && Arina_totBalance >= total_airdrop_Arina/512){

      return airdrop_Arina/256;

  }

  else if(total_airdrop_Arina/512 > Arina_totBalance

  && Arina_totBalance){

      return airdrop_Arina/512;

  }

  else return 0;

}



function Arina_amount_judgment(_level, _Arina) {

        if (_level == 1){

            return _Arina*5/10;

        }

        else if (_level == 2){

            return _Arina*6/10;

        }

        else if (_level == 3){

            return _Arina*7/10;

        }

        else if (_level == 4){

            return _Arina*8/10;

        }

        else if (_level == 5){

            return _Arina*9/10;

        }

        else return "error";

    }



    function eth_amount_judgment(_level){

            if (_level == 1){

                return 1 ;

            }

            else if (_level == 2){

                return 3 ;

            }

            else if (_level == 3){

                return 5 ;

            }

            else if (_level == 4){

                return 10 ;

            }

            else if (_level == 5){

                return 20 ;

            }

            else return "error";

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

    console.log("猜拳"+win(record));

    alert("猜拳"+win(record));
    if (play == 0 && record == 0){

    } else if (play == 0 && record == 1){
      
    } else if (play == 0 && record == 2){

    } else if (play == 1 && record == 0){

    } else if (play == 1 && record == 1){

    } else if (play == 1 && record == 2){

    } else if (play == 2 && record == 0){

    } else if (play == 2 && record == 1){

    } else if (play == 2 && record == 2){

    }
  })

  .on('error', console.error);



  //點擊按鈕後調用函數

  $("#paper").click(function() {

      infoContract.methods.play_paper().send({from:userAccount,gas:250000})
      .then((result)=>{
        console.log(result);
      });

  });

  $("#scissors").click(function() {

      infoContract.methods.play_scissors().send({from:userAccount,gas:250000})
      .then((result)=>{
        console.log(result);
      });
  });

  $("#stone").click(function() {

      infoContract.methods.play_stone().send({from:userAccount,gas:250000})
      .then((result)=>{
        console.log(result);
      });


  });

});



//show函數包裝給setInterval做每秒刷新

function show(){

//讀取地址(web3.js beta版在讀取地址後地址可能會丟失,所以每次動作都先讀取地址)

web3.eth.getAccounts(function(error, result) {

    userAccount = result[0];

    if(userAccount != old_address){

      alert("地址更新");

    }

    if (userAccount == undefined){

      $("#address").html("未載入地址");

    }

    else{

      $("#address").html(userAccount);

    }



//顯示猜拳紀錄

infoContract.getPastEvents("Play_game",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})

.then(function(events) {



  //console.log(events);

  let length = events.length;



    if (userAccount == undefined){

      $("#record0").html("未載入地址");

      $("#record").html("未載入地址");

    }



    else if (length == 0){

      $("#record0").html("未有猜拳紀錄");

      $("#record").html("未有猜拳紀錄");

    }

    else{

      var event_last = events[length-1]

      var record = event_last.returnValues.record;

      var play = event_last.returnValues.player;

      var comp = event_last.returnValues.comp;

      $("#record0").html("玩家出"+mora(play)+", 電腦出"+mora(comp)+", 結果:"+win(record)+"<br>");



      if (length < 2){

      $("#record").html("未有猜拳紀錄");

      }

      else{

        var event_last = events[length-2]

        var record = event_last.returnValues.record;

        var play = event_last.returnValues.player;

        var  comp = event_last.returnValues.comp;

        $("#record").html("玩家出"+mora(play)+", 電腦出"+mora(comp)+", 結果:"+win(record)+"<br>");



        for(var i=3; i<history_amout+2; i++){



          if(length-i<0){

            break

          }

          var event_last = events[length-i]

          var record = event_last.returnValues.record;

          var play = event_last.returnValues.player;

          var comp = event_last.returnValues.comp;

          $("#record").append("玩家出"+mora(play)+", 電腦出"+mora(comp)+", 結果:"+win(record)+"<br>");

         }

       }

     }

   });



//顯示開獎紀錄

infoContract.getPastEvents("Random",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})

.then(function(events) {

    let length = events.length;



    if (userAccount == undefined){

      $("#lottery0").html("未載入地址");

      $("#lottery").html("未載入地址");

    }



    else if (length == 0){

      $("#lottery0").html("未有開獎紀錄");

      $("#lottery").html("未有開獎紀錄");



    }

    else{

      var event_last = events[length-1]

      var random_player = event_last.returnValues.random_player;

      var random_lottery = event_last.returnValues.random_lottery;

      $("#lottery0").html("玩家開獎號碼為"+random_player+", 電腦開獎號碼為"+random_lottery+"<br>");

      if (length < 2){

      $("#lottery").html("未有開獎紀錄");

      }

      else{

        var event_last = events[length-2]

        var random_player = event_last.returnValues.random_player;

        var random_lottery = event_last.returnValues.random_lottery;

        $("#lottery").html("玩家開獎號碼為"+random_player+", 電腦開獎號碼為"+random_lottery+"<br>");



        for(var i=3; i<history_amout+2; i++){

          if(length-i<0){

            break

          }

          var event_last = events[length-i]

          var random_player = event_last.returnValues.random_player;

          var random_lottery = event_last.returnValues.random_lottery;

          $("#lottery").append("玩家開獎號碼為"+random_player+", 電腦開獎號碼為"+random_lottery+"<br>");

        }

      }

    }

  });



    infoContract.methods.view_readyTime(userAccount).call({from:userAccount})

    .then(function(result){

      if (userAccount == undefined){

        $("#readyTime").html("未載入地址");

      }

      else{

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

    }

    else{



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

