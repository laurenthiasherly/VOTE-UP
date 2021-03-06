

<?php include "partials/header.php"; ?>


    

    <div class="side-topics-bar show-for-large">
        
        <!-- ============================================================
                    THE SIDE BAR FOR THE PARTIES PAGE 
        ================================================================= -->   
        
        <ul class="sidebar-topic-style">
            <li class="sidebar-topic" data-direct="scroll2">
                <a><i class="fa fa-line-chart white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll3">
                <a> <i class="fa fa-tree white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll4">
                <a> <i class="fa fa-graduation-cap white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll5">
                <a> <i class="fa fa-medkit white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll6">
                <a> <i class="fa fa-users white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll7">
                <a> <i class="fa fa-building white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll8">
                <a> <i class="fa fa-flag white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll9">
                <a> <i class="fa fa-lock white" aria-hidden="true"> </i> </a></li>
            <li class="sidebar-topic" data-direct="scroll10">
                <a> <i class="fa fa-sitemap white" aria-hidden="true"> </i> </a></li>
            

            <li class="sidebar-topic see-you-vote" id="seeyourvote">
                <a> <i class="fa fa-arrows fa-spin white" aria-hidden="true"> </i> </a></li>

            <li id="votingBtn" class="sidebar-topic" data-direct="voting0">
                <a> <i id="voting-icon" class="fa fa-check " aria-hidden="true"> </i>
                </a></li>
        </ul>
        <div class="tip-topic-style">
            <div class="tip-topic"><a class="tip-style">Economy</a></div>
            <div class="tip-topic"><a class="tip-style">Environment</a></div>
            <div class="tip-topic"><a class="tip-style">Education</a></div>
            <div class="tip-topic"><a class="tip-style">Health</a></div>
            <div class="tip-topic"><a class="tip-style">Immigration</a></div>
            <div class="tip-topic"><a class="tip-style">Housing</a></div>
            <div class="tip-topic"><a class="tip-style">Foreign Policy</a></div>
            <div class="tip-topic"><a class="tip-style">Privacy</a></div>
            <div class="tip-topic"><a class="tip-style">Electoral Reform</a></div>
            <div class="tip-topic"><a class="tip-style">See Your Vote</a></div>
            <div class="tip-topic"><a class="tip-style">Voting</a></div>
        </div>
    </div>

    <div id="modalBox" class="modal-box-comparing">
        <div id="closeComparingBox"><i class="fa fa-3x fa-times-circle-o" aria-hidden="true"></i></div>
        <div class="comparing-box">
            <div class="comp-topbar-style">
                <ul>
                    <li data-topic="1" data-selected="0" data-cparty="#ff1a24" class="party-top-comp">LIBERAL</li>
                    <li data-topic="1" data-selected="0" data-cparty="#0331cf" class="party-top-comp">CONSERVATIVE</li>
                    <li data-topic="1" data-selected="0" data-cparty="#f6821f" class="party-top-comp">DEMOCRATIC</li>
                    <li data-topic="1" data-selected="0" data-cparty="#3c9b35" class="party-top-comp">GREEN</li>
                </ul>
            </div>
            <div class="comp-sidebar-topic">
                <ul class="comp-topic-style">
                    <li data-topic="1" data-selected="0" class="sidebar-topic-filt">
                        <a> <i class="fa fa-line-chart white" aria-hidden="true"> </i> </a></li>
                    <li data-topic="2" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-tree white" aria-hidden="true"> </i></a></li>
                    <li data-topic="3" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-graduation-cap white" aria-hidden="true"> </i></a></li>
                    <li data-topic="4" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-medkit white" aria-hidden="true"> </i></a></li>
                    <li data-topic="5" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-users white" aria-hidden="true"> </i></a></li>
                    <li data-topic="6" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-building white" aria-hidden="true"> </i></a></li>
                    <li data-topic="7" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-flag white" aria-hidden="true"> </i></a></li>
                    <li data-topic="8" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-lock white" aria-hidden="true"> </i></a></li>
                    <li data-topic="9" data-selected="0" class="sidebar-topic-filt">
                        <a><i class="fa fa-sitemap white" aria-hidden="true"> </i></a></li>
                </ul>
            </div>
            <div class="modalbox-topic-text center">
                <div class="modalbox-topic" id="modal-text0"><a>Economy</a></div>
                <div class="modalbox-topic" id="modal-text1"><a>Environment</a></div>
                <div class="modalbox-topic" id="modal-text2"><a>Education</a></div>
                <div class="modalbox-topic" id="modal-text3"><a>Health</a></div>
                <div class="modalbox-topic" id="modal-text4"><a>Immigration</a></div>
                <div class="modalbox-topic" id="modal-text5"><a>Housing</a></div>
                <div class="modalbox-topic" id="modal-text6"><a>Foreign Policy</a></div>
                <div class="modalbox-topic" id="modal-text7"><a>Privacy</a></div>
                <div class="modalbox-topic" id="modal-text8"><a>Electoral Reform</a></div>

            </div>
            <div class="comp-content">
                <div id="contentTopic">
                    <h3 class="content-topic-default">Please select the parties and Topics.</h3>
                </div>
            </div>
        </div>
    </div>

		<div class="votingBoxGra">
			<h3 class="center">Graphic</h3>
			<div class="votingGra-style">
				<div class="party-gra-vote">
					<div id="grafic-con" class="column small-3 medium-3 large-3 gra-col">
					</div>
					<div id="grafic-ndp" class="column small-push-3 medium-push-3 large-push-3 small-3 medium-3 large-3 gra-col"></div>
					<div id="grafic-gre" class="column small-push-6 medium-push-6 large-push-6 small-3 medium-3 large-3 gra-col"></div>
					<div id="grafic-lib" class="column small-push-9 medium-push-9 large-push-9 small-3 medium-3 large-3 gra-col"></div>
				</div>
			</div>
			<div class="party-gra-name">
				<div class="column small-3 medium-3 large-3">CO</div>
				<div class="column small-3 medium-3 large-3">NDP</div>
				<div class="column small-3 medium-3 large-3">GR</div>
				<div class="column small-3 medium-3 large-3">LI</div>
			</div>
		</div>
			
		</div>
        <div class="voting-box">
            <div class="voting-col">
                <p class="hide-for-small-only">Conservative</p>
				<p class="show-for-small-only">CO</p>
                <a href="parties.php?party=Conservative"><div id="party1total"></div></a>
            </div>
            <div class="voting-col">
                <p class="hide-for-small-only">Democratic</p>
				<p class="show-for-small-only">NDP</p>
                <a href="parties.php?party=Democratic"><div id="party2total"></div></a>
            </div>
            <div class="voting-col">
                <p class="hide-for-small-only">Green</p>
				<p class="show-for-small-only">GR</p>
                <a href="parties.php?party=Green"><div id="party3total"></div></a>
            </div>
            <div class="voting-col">
                <p class="hide-for-small-only">Liberal</p>
				<p class="show-for-small-only">LI</p>
                 <a href="parties.php?party=Liberal"><div id="party4total"></div></a>
            </div>
            <div id="refreshVoting" class="voting-col-clear hide-for-small-only">
                <h3> Clear <br> Voting </h3>
            </div>
            <div class="voting-close" id="voting-close">
                <i class="fa fa-sort-down fa-2x white" aria-hidden="true"> </i>
            </div>
        </div>


  