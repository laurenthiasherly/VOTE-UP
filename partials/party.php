

<?php include "partials/header.php"; ?>


    <div class="side-topics-bar">
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
            
            <li id="filterShow" class="sidebar-topic" data-direct="filter0">
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
            <div class="tip-topic"><a class="tip-style">Compare Party!</a></div>
            <div class="tip-topic"><a class="tip-style">Voting</a></div>
        </div>
    </div>

    <div id="modalBox" class="modal-box-comparing">
        <div id="closeComparingBox">X</div>
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
            
            <div class="comp-content">
                <div id="contentTopic">
                    <h3 class="content-topic-default">Please select the parties and Topics.</h3>
                </div>
            </div>
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
    </div>

    <div id="votingBox" class="center">
        <div class="voting-box">
            <div class="voting-col">
                <p>Conservative</p>
                <a><div id="party1total"></div></a>
            </div>
            <div class="voting-col">
                <p>Democratic</p>
                <a><div id="party2total"></div></a>
            </div>
            <div class="voting-col">
                <p>Green</p>
                <a><div id="party3total"></div></a>
            </div>
            <div class="voting-col">
                <p>Liberal</p>
                <a><div id="party4total"></div></a>
            </div>
            <div id="refreshVoting" class="voting-col-clear">
                <h3> Clear <br> Voting </h3>
            </div>
            <div class="voting-close" id="voting-close">
                <i class="fa fa-sort-down fa-2x white" aria-hidden="true"> </i>
            </div>
        </div>
    </div>
  