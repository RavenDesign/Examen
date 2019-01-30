use Competition;

insert into Liga (
    Name,
    Year,
    IsInPlanning)
values (
    'Jupiler League',
    '2018',
    0,
    1);
    
insert into Team (
    Name,
    Location,
    Score)
values (
    'Club Anderlecht',
    'Brussel',
    0);
    
insert into Team (
    Name,
    Location,
    Score)
values (
    'Club Brugge',
    'Brugge',
    0);
    
    
insert into Game (
     `Date`,
     Status,
     ScoreHome,
     ScoreVisitors,
     TeamVisitorId,
     TeamHomeId,
     LigaId)
values (
    '2018-11-14 13:00',
    'gepland',
    0,
    0,
    1,
    2,
    1
);

select TeamVisitor.Name,
    TeamHome.Name,
    Liga.Name,
    Game.`Date`
from Game
    inner join Team As TeamVisitor on Game.TeamVisitorId = TeamVisitor.id
    inner join Team As TeamHome on Game.TeamHomeId = TeamHome.id
    inner join Liga on Game.LigaId = Liga.id
order by Game.`Date`;
    

