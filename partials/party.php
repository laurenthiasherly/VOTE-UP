

<?php include "partials/header.php"; ?>


    <div class="side-topics-bar">
        <ul class="sidebar-topic-style">
            <li class="sidebar-topic" data-direct="scroll2"><a>1</a></li>
            <li class="sidebar-topic" data-direct="scroll3"><a>2</a></li>
            <li class="sidebar-topic" data-direct="scroll4"><a>3</a></li>
            <li class="sidebar-topic" data-direct="scroll5"><a>4</a></li>
            <li class="sidebar-topic" data-direct="scroll6"><a>5</a></li>
            <li class="sidebar-topic" data-direct="scroll7"><a>6</a></li>
            <li class="sidebar-topic" data-direct="scroll8"><a>7</a></li>
            <li class="sidebar-topic" data-direct="scroll9"><a>8</a></li>
            <li class="sidebar-topic" data-direct="scroll10"><a>9</a></li>
            <li id="filterShow" class="sidebar-topic" data-direct="filter0"><a>F</a></li>
            <li id="votingBtn" class="sidebar-topic" data-direct="voting0"><a>V</a></li>
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
            <div class="tip-topic"><a class="tip-style">Filter</a></div>
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
                    <li data-topic="1" data-selected="0" class="sidebar-topic-filt"><a>1</a></li>
                    <li data-topic="2" data-selected="0" class="sidebar-topic-filt"><a>2</a></li>
                    <li data-topic="3" data-selected="0" class="sidebar-topic-filt"><a>3</a></li>
                    <li data-topic="4" data-selected="0" class="sidebar-topic-filt"><a>4</a></li>
                    <li data-topic="5" data-selected="0" class="sidebar-topic-filt"><a>5</a></li>
                    <li data-topic="6" data-selected="0" class="sidebar-topic-filt"><a>6</a></li>
                    <li data-topic="7" data-selected="0" class="sidebar-topic-filt"><a>7</a></li>
                    <li data-topic="8" data-selected="0" class="sidebar-topic-filt"><a>8</a></li>
                    <li data-topic="9" data-selected="0" class="sidebar-topic-filt"><a>9</a></li>
                </ul>
            </div>
            <div class="comp-content">
                <div id="contentTopic">
                    <p class="content-topic-default">Please select the parties and Topics.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="votingBox" class="centered">
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
                X
            </div>
        </div>
    </div>
  