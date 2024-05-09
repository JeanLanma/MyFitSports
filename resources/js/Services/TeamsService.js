export const ParseTeamCover = (cover = null) => {
    return (cover) 
                ? `/storage/teams/${cover}` 
                : '/assets/default-cover-team.svg';
}