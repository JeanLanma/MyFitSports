import{_ as m}from"./AppLayout-CvsJiEXt.js";import{S as i}from"./SectionBorder-DFs-s8NN.js";import s from"./CreateTeamForm-BXeHujYt.js";import l from"./AddTeamCoverForm-CJ_VS1CJ.js";import{o as p,c as n,w as a,a as e,t as c,b as o}from"./app-Dp7__3h7.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./FormSection-CEY2eKan.js";import"./SectionTitle-DkKz-1ex.js";import"./TextInput-DA2eW2NL.js";import"./InputLabel-BW1RJZ-j.js";import"./PrimaryButton-l7Cqa1Mq.js";import"./TeamsService-Z9qRd_E0.js";const u={class:"font-semibold text-xl text-gray-800 leading-tight"},_={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},j={__name:"Show",props:{errors:Object,team:{type:Object,default:()=>({name:null,cover:null})}},setup(r){const t=r;return(d,f)=>(p(),n(m,{title:"Añadir nuevo equipo"},{header:a(()=>[e("h2",u,c(t.team.name!=null?"Editar equipo":"Nuevo equipo"),1)]),default:a(()=>[e("div",null,[e("div",_,[o(s,{team:t.team},null,8,["team"]),o(i),o(l,{team:t.team,class:"mt-4"},null,8,["team"])])])]),_:1}))}};export{j as default};