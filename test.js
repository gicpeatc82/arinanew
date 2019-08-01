function aa(){
    web3.eth.getAccounts(function(error, result) {
    userAccount = result[0];

    infoContract.getPastEvents("Play_game",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})
    .then(function(events) {
      let length = events.length;
      var event_last = events[length-1];
      var record = event_last.returnValues.record;
      if(record == 0 || record == 1){
        //$(".wrapper").show();
        $("#imga").show();
        $(".container-fluid").hide();
        web3.eth.getAccounts(function(error, result) {
          userAccount = result[0];
          $("#status").html("再接再厲!!");
          $("#GIC").html("0");
          $("#Arina").html("0");
          infoContract.getPastEvents("Random",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})
            .then(function(lottery_events) {
            console.log(lottery_events);
                let lottery_length = lottery_events.length;
                var lottery_event_last = lottery_events[lottery_length-1];
                var random_player = lottery_event_last.returnValues.random_player;
                var random_lottery = lottery_event_last.returnValues.random_lottery;

                if(random_player == random_lottery){
                    $("#ETH").html(ETH);
                }else{
                    $("#ETH").html("0");
                }
            });
        });

      }else if(record == 2){

        $("#pyro").show();
        $("#imga").show();
        $("body").css("overflow","hidden");
        $(".container-fluid").hide();
        var Arina;
        var ETH;
        var GIC;
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
            GIC =  airdrop_GIC/(10**18)

            //console.log(Arina_totBalance, total_airdrop_Arina, airdrop_Arina, _level, airdrop_GIC);
            var now_airdrop = Arina_judgment(Arina_totBalance, total_airdrop_Arina, airdrop_Arina);
            //console.log(now_airdrop);
            Arina = Arina_amount_judgment(_level, now_airdrop);

            ETH = eth_amount_judgment(_level);
            $("#status").html("恭喜獲得!!");
            $("#GIC").html(GIC);
            $("#Arina").html(Arina);
          });
          infoContract.getPastEvents("Random",{filter:{from:userAccount},fromBlock:0,toBlock:'latest'})
            .then(function(lottery_events) {
                let lottery_length = lottery_events.length;
                var lottery_event_last = lottery_events[lottery_length-1];
                var random_player = lottery_event_last.returnValues.random_player;
                var random_lottery = lottery_event_last.returnValues.random_lottery;

                if(random_player == random_lottery){
                    $("#ETH").html(ETH);
                }else{
                    $("#ETH").html("0");
                }
            });
        });

      }
    });
  });

    
  }