{{ form("Users/update", "method": "post") }}
<fieldset>
<legend>Ajouter/modifier un utilisateur</legend>
<div class="alert alert-info">Utilisateur : {{user.toString()}}</div>
<div class="form-group">
	<input type="hidden" name="id" value="{{user.getId()}}">
	<input type="text" name="identite" value="{{user.getIdentite()}}" placeholder="Entrez votre identité" class="form-control">
	<input type="mail" name="mail" value="{{user.getMail()}}" placeholder="Entrez l'adresse email" class="form-control">
	<input type="password" name="password" value="{{user.getPassword()}}" placeholder="Entrez le mot de passe" class="form-control">
	<input type="text" name="role" value="{{user.getRole()}}" placeholder="Entrez votre role" class="form-control">
</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="{{url.get("Users")}}">Annuler</a>
</div>
</fieldset>
</form>