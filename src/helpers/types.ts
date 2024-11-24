export type UserSessionType = {
  auth_user_id: string,
  auth_user_role: string,
  auth_login_type: string,
  faculty_id: string | null
}

export type TmpUserSessionType = {
  auth_user_id: string,
  auth_user_role: string,
  auth_login_type: string
}

export type UserAccountType = {
  user_id: string;
  user_name: string;
  password: string;
  email_address: string;
  birthday: string;
  contact_no: string;
  full_name: string;
  created_at: string;
  updated_at: string;
  gender: string;
  city: string;
  address: string;
  role: string;
  faculty_id: string;
  pricing: string;
  oauth_google: string;
  oauth_facebook: string;
  status: string;
};
