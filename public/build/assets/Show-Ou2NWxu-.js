import{_ as m}from"./AppLayout-DhUFkpaH.js";import{S as i}from"./SectionBorder-CZyYbTGs.js";import s from"./CreateTeamForm-7sxmTlW1.js";import l from"./AddTeamCoverForm-ScqQW7tN.js";import{o as p,c as n,w as a,a as e,t as c,b as o}from"./app-CwLFubu_.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./FormSection-CoCU78gn.js";import"./SectionTitle-BiKmqfwp.js";import"./TextInput-C3kDJ56p.js";import"./InputLabel-CDbgFFbG.js";import"./PrimaryButton-DEP6GBP2.js";import"./TeamsService-Z9qRd_E0.js";const u={class:"font-semibold text-xl text-gray-800 leading-tight"},_={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},j={__name:"Show",props:{errors:Object,team:{type:Object,default:()=>({name:null,cover:null})}},setup(r){const t=r;return(d,f)=>(p(),n(m,{title:"Añadir nuevo equipo"},{header:a(()=>[e("h2",u,c(t.team.name!=null?"Editar equipo":"Nuevo equipo"),1)]),default:a(()=>[e("div",null,[e("div",_,[o(s,{team:t.team},null,8,["team"]),o(i),o(l,{team:t.team,class:"mt-4"},null,8,["team"])])])]),_:1}))}};export{j as default};