// Feel free to copy and use
const inviteId = "kyno";
const apiUrl = "https://discord.com/api/v10/invites/"+inviteId+"?with_counts=true";

fetch(apiUrl)
.then(response => response.json())
.then(inviteData => {
    const guildId = inviteData.guild.id
    const serverName = inviteData.guild.name;
    const serverIcon = inviteData.guild.icon;
    const memberCount = inviteData.approximate_member_count;
    const presenceCount = inviteData.approximate_presence_count;

    document.getElementById('discordInvite').href = "https://discord.gg/"+inviteId;

    document.getElementById('serverIcon').src = "https://cdn.discordapp.com/icons/"+guildId+"/"+serverIcon;

    document.getElementById('memberData').innerHTML =
    `<i class="fa-solid fa-circle online"></i> ${presenceCount} Online <i class="fa-solid fa-circle offline"></i> ${memberCount} Members`;

    document.getElementById('serverName').innerHTML = serverName;
})
.catch(error => {
    console.error("Error: Unable to fetch invite information.", error);
});