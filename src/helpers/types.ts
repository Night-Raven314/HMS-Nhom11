export type UserSessionType = {
  auth_user_id: string,
  auth_user_role: string,
  auth_login_type: string
}

export type TmpUserSessionType = {
  auth_user_id: string,
  auth_user_role: string,
  auth_login_type: string,
  temp_regis_name: string,
  temp_regis_email: string
}